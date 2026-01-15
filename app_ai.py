from flask import Flask, request, jsonify
from flask_cors import CORS
import google.generativeai as genai
import os

app = Flask(__name__)
# Habilita CORS para todas as origens
# Isso é essencial para que o PHP (localhost:80 ou outro) consiga falar com o Python (localhost:5000)
CORS(app)

# Configuração da API do Google Gemini
# IMPORTANTE: Substitua 'SUA_API_KEY_AQUI' pela sua chave real se não estiver usando a variável de ambiente
# Você pode obter uma chave gratuita em: https://aistudio.google.com/app/apikey
GOOGLE_API_KEY = os.getenv('GOOGLE_API_KEY', 'AIzaSyAZod6tvxq5awrodb1DsrKj_9b0w5W0or8') # <--- Coloque sua chave aqui se precisar
genai.configure(api_key=GOOGLE_API_KEY)

# Configuração do Modelo e System Instruction
generation_config = {
  "temperature": 0.7,
  "top_p": 0.95,
  "top_k": 40,
  "max_output_tokens": 8192,
}

system_instruction = """
Você é o Assistente Oficial da Mestria Digital.
Sua persona é: Motivado, Técnico e Especialista em Marketing Digital.
Seu objetivo é ajudar alunos do curso Mestria Digital.
Regras:
1. Responda APENAS sobre marketing digital, lançamentos, tráfego pago e conteúdo do curso.
2. Se o usuário perguntar sobre outros assuntos (futebol, política, receitas), diga educadamente que só pode ajudar com o curso.
3. Seja breve e direto, mas amigável. Use emojis ocasionalmente.
"""

model = genai.GenerativeModel(
    model_name="gemini-1.5-flash",
    generation_config=generation_config,
    system_instruction=system_instruction
)

# Histórico de chat simples (em memória)
chat_session = model.start_chat(history=[])

@app.route('/ask', methods=['POST'])
def ask_gemini():
    try:
        data = request.json
        user_message = data.get('message')

        if not user_message:
            return jsonify({"error": "Mensagem vazia"}), 400

        # Envia a mensagem para o Gemini
        response = chat_session.send_message(user_message)
        
        return jsonify({
            "response": response.text
        })

    except Exception as e:
        print(f"Erro no servidor: {e}") # Log no terminal do Python
        return jsonify({"error": str(e)}), 500

if __name__ == '__main__':
    # Rodar na porta 5000 (padrão Flask)
    print("🤖 Assistente Mestria Digital rodando na porta 5000...")
    app.run(debug=True, port=5000)
