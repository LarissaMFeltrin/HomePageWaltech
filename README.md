# WALTECH - Homepage

Homepage moderna desenvolvida com Laravel + Tailwind CSS.

## 🚀 Tecnologias

- **Laravel 10** - Framework PHP
- **Tailwind CSS 3** - Framework CSS utilitário
- **Vite** - Build tool moderna
- **Blade** - Template engine do Laravel

## 📋 Pré-requisitos

- PHP 8.1 ou superior
- Composer
- Node.js 18+ e NPM

## 🛠️ Instalação

1. **Instalar dependências PHP:**
```bash
composer install
```

2. **Instalar dependências Node:**
```bash
npm install
```

3. **Configurar ambiente:**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Compilar assets (desenvolvimento):**
```bash
npm run dev
```

5. **Iniciar servidor Laravel:**
```bash
php artisan serve
```

Acesse: http://localhost:8000

## 📦 Build para produção

```bash
npm run build
```

## 📁 Estrutura do Projeto

```
pagewaltech/
├── app/                    # Lógica da aplicação
├── resources/
│   ├── views/             # Templates Blade
│   │   ├── layouts/       # Layout principal
│   │   └── home.blade.php # Homepage
│   ├── css/               # Estilos Tailwind
│   └── js/                # JavaScript
├── routes/                # Rotas
├── public/                # Arquivos públicos
└── tailwind.config.js     # Configuração Tailwind
```

## 🎨 Personalização (portfólio WALTECH)

O site está com **tema escuro** e **paleta de portfólio** (azul/ciano). Para alinhar com o **portfolioWALTECH.pdf**:

### 1. Cores e textos centralizados
Edite **`config/portfolio.php`**:
- **`company`**: nome, tagline, descrição
- **`colors`**: cole as cores em HEX do PDF (primary, dark_bg, accent, etc.)
- **`contact`**: e-mail e telefone
- **`sections`**: títulos e subtítulos de cada seção (sobre, serviços, projetos, contato)

### 2. Cores no Tailwind
Se precisar mudar a paleta global, edite **`tailwind.config.js`**:
- `primary`: tons de azul (destaque)
- `portfolio.dark`, `portfolio.dark-card`, `portfolio.accent`: fundos e acento

### 3. Conteúdo das seções
Os textos da homepage vêm de `config/portfolio.php`. Para textos longos ou específicos, edite **`resources/views/home.blade.php`**.

### 4. Estilos customizados
Adicione classes em **`resources/css/app.css`** na seção `@layer components`.

## 📝 Próximos Passos

- [ ] Configurar formulário de contato (backend)
- [ ] Adicionar imagens reais dos projetos
- [ ] Integrar com banco de dados (se necessário)
- [ ] Adicionar mais páginas (sobre, serviços detalhados, etc.)
- [ ] Configurar SEO (meta tags, sitemap)
- [ ] Adicionar analytics

## 📧 Contato

Para dúvidas ou sugestões, entre em contato!
