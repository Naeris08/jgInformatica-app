# TechInventory Manager 🛠️

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)

O **TechInventory Manager** é uma solução robusta para gestão de ativos tecnológicos e controle de inventário. Desenvolvido com **Laravel 11** e **Tailwind CSS**, o sistema oferece uma interface Dark Mode premium, focada em alta legibilidade e eficiência operacional.

---

## ✨ Funcionalidades

- **Dashboard Executivo:** Monitoramento em tempo real do valor total do patrimônio e volume de itens.
- **Gestão de Equipamentos:** CRUD completo com especificações técnicas, controle de preços e estoque.
- **Categorização Inteligente:** Organização por tipos de hardware para facilitar a auditoria e busca.
- **Controle de Estoque:** Alertas visuais automáticos para itens com baixo nível de unidades (Stock Crítico).
- **Gestão de Mídia:** Upload de imagens dos produtos com integração ao Storage do Laravel e pré-visualização.
- **UI/UX Moderno:** Design baseado em tons de Slate/Zinc com contraste equilibrado para reduzir fadiga visual.

---

## 🚀 Guia de Instalação

Siga estes passos para configurar o ambiente de desenvolvimento localmente:

### 1. Clonar o Repositório
```bash
git clone [https://github.com/seu-usuario/tech-inventory.git](https://github.com/seu-usuario/tech-inventory.git)
cd tech-inventory
2. Instalar Dependências
Bash
# Instalar dependências do PHP (Laravel)
composer install

# Instalar dependências do Front-end (Tailwind/Vite)
npm install
3. Configuração de Ambiente
Bash
# Criar arquivo de ambiente e gerar chave da aplicação
cp .env.example .env
php artisan key:generate
Atenção: Configure as credenciais do seu Banco de Dados no arquivo .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD).

4. Banco de Dados e Storage
Bash
# Criar tabelas e rodar as migrações
php artisan migrate

# Criar o link simbólico para que as fotos dos produtos fiquem visíveis
php artisan storage:link
💻 Como Usar (Fluxo de Trabalho)
Para que o sistema funcione com todos os recursos visuais (Tailwind) e rotas, mantenha dois terminais abertos:

Terminal 1 (Servidor Local):

Bash
php artisan serve
Terminal 2 (Compilador de CSS/JS - Vite):

Bash
npm run dev
🛠️ Comandos de Manutenção
Caso encontre erros de rota, cache ou ao adicionar novos controladores:

Bash
# Limpar cache de rotas e configurações
php artisan route:clear
php artisan config:clear

# Atualizar o mapa de classes (Autoload)
composer dump-autoload

# Gerar arquivos finais de CSS/JS para produção
npm run build
🏗️ Stack Tecnológica
Backend: Laravel 12 (PHP 8.2+)

Frontend: Tailwind CSS & Blade Components

Autenticação: Laravel Breeze

Banco de Dados: MySQL

Build Tool: Vite

Desenvolvido por João Guilherme P. de Souza 👋