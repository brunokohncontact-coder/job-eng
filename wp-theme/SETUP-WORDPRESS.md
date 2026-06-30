# JOB Engenharia — Conversão para WordPress (guia de configuração)

> Documento de trabalho. Atualizado em 2026-06-24.

## Onde estamos

- Pasta de trabalho daqui pra frente: **`site-job-eng/`** (cópia renomeada de `wireframe-home`).
- Backups do site estático de hoje (não mexer):
  - Tag git: `site-estatico-pre-wp-2026-06-24`
  - Zip: `_backup-site-job-2026-06-24.zip` (na pasta `para claude/`)
  - Pasta original `wireframe-home/` mantida congelada (pode ser apagada depois de confirmar que `site-job-eng/` está OK).

## O que JÁ existe no tema (`wp-theme/`)

- `style.css` — cabeçalho do tema (nome, versão).
- `functions.php` — setup do tema, menus, enqueue do CSS compilado + JS, **Custom Post Type `tecnologia`**, **Página de Opções do ACF** ("Config. JOB") e grupos de campos ACF (dados globais de contato + tecnologia), tudo registrado via PHP (versionado, não depende do banco).
- Build do Tailwind: `tailwind.config.js`, `package.json`, `assets/css/input.css` → compila para `assets/css/app.css` (resolve o problema do Tailwind via CDN).
- `assets/js/main.js` — JS compartilhado (header ao rolar, menu mobile, reveal on scroll).

## O que FALTA (próxima fase de desenvolvimento)

- `index.php`, `header.php`, `footer.php` — **sem eles o tema não renderiza**.
- Templates de página, portados do HTML atual: `front-page.php` (home), `page-servicos.php`, `page-sobre.php`, `page-contato.php`, `page-ecojob.php`, `page-carreiras.php`, `page-canal-denuncia.php`, páginas legais, `404.php`, `obrigado`.
- `single-tecnologia.php` / listagem das tecnologias (EJ 01–04, RCK 3000).
- Ligar os textos do site aos campos ACF.
- Gerar `assets/css/app.css` (rodar o build do Tailwind).

## ⚠️ Atenção: o tema está defasado vs. o site atual

O tema foi iniciado **antes** das últimas mudanças do site estático (mosaico P&B da home, fotos novas, novo layout de `servicos`). Os templates devem ser portados a partir dos arquivos **`.html` atuais na raiz**, não do CSS antigo em `input.css`.

## Formulários: via PLUGIN (decisão tomada)

Plugin, não código na mão — assim o cliente edita campos, mensagens e **o e-mail que recebe os contatos** pelo painel, sem tocar em código.

- **Fluent Forms** (grátis) — construtor visual, anti-spam, guarda os envios, notificação por e-mail. Refazer: contato, trabalhe conosco, canal de denúncia.
- **FluentSMTP** (grátis) — garante a entrega dos e-mails (sem ele, formulários costumam cair no spam ou falhar em hospedagem compartilhada).

## Stack de plugins

1. **ACF Pro** — necessário (a Página de Opções, Repeater e Gallery já usados no `functions.php` são recursos Pro). ~US$ 49/ano por site.
2. **Fluent Forms** (grátis) — formulários.
3. **FluentSMTP** (grátis) — entrega de e-mail.
4. (Opcional, depois) SEO (Rank Math ou Yoast). Backup já é coberto pelo add-on da Umbler.

## Ambiente — passo a passo (parte que roda fora do Claude Code)

1. Instalar **LocalWP** (Windows) e criar um site WordPress local.
2. No WP local: instalar e ativar **ACF Pro**, **Fluent Forms**, **FluentSMTP**.
3. Copiar (ou linkar) a pasta `wp-theme/` para `wp-content/themes/job-eng/` do site local.
4. Dentro do tema: `npm install` e depois `npm run build` (gera `assets/css/app.css`). Use `npm run dev` durante o desenvolvimento (recompila ao salvar).
5. Ativar o tema "JOB Engenharia".
6. (Em paralelo) Instalar WordPress na **Umbler**, usando o banco `ecoj_wordpress`, como ambiente de produção.

## Fluxo de trabalho

- O código do tema mora aqui (versionado no git). O LocalWP serve a partir de uma cópia/link dessa pasta.
- Para publicar: rodar o build do CSS e enviar a pasta do tema (+ exportar/importar o conteúdo do ACF) para a Umbler.
- **Obs. Google Drive:** evitar rodar o WordPress local direto de dentro do Drive (trava de arquivo/sync). O LocalWP guarda os arquivos na pasta dele; esta pasta no Drive fica como fonte versionada.

## Próximas fases

1. Ambiente no ar (passo a passo acima).
2. Foundation: `header.php`, `footer.php`, `index.php` + home (`front-page.php`) → verificar a renderização.
3. Demais páginas, uma a uma, ligando os campos ACF (porte feito em paralelo com vários agentes, conferindo contra o HTML atual).
4. Formulários (Fluent Forms) + SMTP.
5. Painel "amigável" pro cliente (esconder menus desnecessários, usuário Editor com acesso limitado).
6. Migração e publicação na Umbler (DNS, SSL, remover página de manutenção, QA mobile).
