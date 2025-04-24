# 📦 Prova Backend - Simulação de Empréstimos

Este projeto é uma API REST desenvolvida em **Laravel** para simulação de crédito, conforme os requisitos da prova. A API consome dados estáticos (JSON) de instituições, convênios e taxas, sem utilização de banco de dados.

---

## 🚀 Como rodar o projeto

### ⚙️ Requisitos

- PHP >= 8.1
- Composer
- Laravel 10+
- Postman (ou Insomnia) para testar as rotas

### 📅 Passos para rodar localmente:

1. Clone este repositório:

```bash
git clone https://github.com/seu-usuario/prova-backend.git
cd prova-backend
```

2. Instale as dependências:

```bash
composer install
```

3. Inicie o servidor:

```bash
php artisan serve
```

O servidor irá rodar por padrão em `http://127.0.0.1:8000`

---

## 📂 Estrutura dos dados

Os dados utilizados pela API estão armazenados nos seguintes arquivos dentro da pasta `storage/app/data`:

- `instituicoes.json`
- `convenios.json`
- `taxas_instituicoes.json`

---

## 📡 Rotas da API

### ✅ Listar instituições

- **Método:** GET  
- **URL:** `/api/instituicoes`

### ✅ Listar convênios

- **Método:** GET  
- **URL:** `/api/convenios`

### ✅ Simulação de crédito

- **Método:** POST  
- **URL:** `/api/simulacoes`
- **Body (JSON):**

```json
{
  "valor_emprestimo": 10000,
  "instituicoes": ["BMG", "PAN"],
  "convenios": ["INSS"],
  "parcela": 72
}
```

- **Campos obrigatórios:**
  - `valor_emprestimo`

- **Resposta esperada:**
```json
[
  {
    "instituicao": "BMG",
    "convenio": "INSS",
    "parcelas": 72,
    "valor_parcela": 260.4,
    "taxaJuros": 2.05
  }
]
```

---

## 🧪 Collection do Postman

A collection para importação no Postman está disponível no arquivo `postman_collection.json` incluído neste repositório.

---

## 📧 Contato

Em caso de dúvidas ou problemas ao rodar a aplicação, estou à disposição.

