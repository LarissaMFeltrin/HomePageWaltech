# Deploy no Render - WALTECH

## Passo 1: Preparar o repositório Git

```bash
# Se ainda não tem um repositório, inicialize:
git init
git add .
git commit -m "feat: projeto WALTECH pronto para deploy"

# Crie um repositório no GitHub e faça push:
git remote add origin https://github.com/SEU-USUARIO/waltech.git
git branch -M main
git push -u origin main
```

## Passo 2: Criar conta no Render

1. Acesse: https://render.com
2. Clique em "Get Started for Free"
3. Conecte sua conta GitHub

## Passo 3: Criar novo Web Service

1. No dashboard do Render, clique em "New +"
2. Selecione "Web Service"
3. Conecte seu repositório GitHub
4. Configure:
   - **Name:** waltech
   - **Region:** Oregon (US West) ou mais próximo
   - **Branch:** main
   - **Runtime:** PHP
   - **Build Command:** `./build.sh`
   - **Start Command:** `heroku-php-apache2 public/`

## Passo 4: Configurar Variáveis de Ambiente

Na seção "Environment Variables", adicione:

```
APP_NAME=WALTECH
APP_ENV=production
APP_DEBUG=false
APP_URL=https://waltech.onrender.com
APP_TIMEZONE=America/Sao_Paulo

LOG_CHANNEL=stderr
LOG_LEVEL=info

SESSION_DRIVER=file
SESSION_LIFETIME=120

CACHE_STORE=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
```

**IMPORTANTE:** O Render vai gerar automaticamente a `APP_KEY`

## Passo 5: Deploy

1. Clique em "Create Web Service"
2. Aguarde o build (5-10 minutos na primeira vez)
3. Acesse a URL fornecida pelo Render

## Passo 6: Gerar APP_KEY (se necessário)

Se precisar gerar uma nova chave:

```bash
# Localmente
php artisan key:generate --show
```

Copie a chave e adicione nas variáveis de ambiente do Render.

## Troubleshooting

### Erro 500
- Verifique os logs no Render Dashboard
- Certifique-se que APP_KEY está configurada
- Verifique se APP_DEBUG=false

### Assets não carregam
- Rode `npm run build` localmente primeiro
- Commit os arquivos em `public/build`
- Faça push novamente

### Mudanças não aparecem
- O Render faz deploy automático quando você faz push
- Ou clique em "Manual Deploy" no dashboard

## URLs Importantes

- **Site:** https://waltech.onrender.com (após deploy)
- **Dashboard:** https://dashboard.render.com
- **Logs:** Disponíveis no dashboard do Render

## Plano Free - Limitações

- Site "dorme" após 15 min de inatividade
- Primeiro acesso após "dormir" pode levar 30-60 segundos
- Limite de 750 horas/mês (suficiente para 1 site)
- Para site sempre ativo, upgrade para plano pago ($7/mês)

## Domínio Próprio (Opcional)

1. No Render Dashboard → Settings
2. "Custom Domains"
3. Adicione seu domínio (ex: waltech.com.br)
4. Configure DNS conforme instruções do Render
