<?php
/**
 * ═══════════════════════════════════════════════════════
 *  PAINEL — BRANDING + ATALHOS PARA O CLIENTE
 *  Complementa a seção 4 do functions.php (que já esconde o editor de
 *  blocos nas Páginas, enxuga o menu p/ não-admin e mostra o aviso).
 *  Aqui: marca JOB na tela de login, rodapé do admin e um widget de
 *  boas-vindas no Painel com atalhos reais. Incluído pelo functions.php.
 * ═══════════════════════════════════════════════════════
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* Cores da marca (espelham o tailwind.config.js) */
const JOB_BLACK  = '#1d1d1b';
const JOB_GREEN  = '#00662f';
const JOB_GREEN2 = '#199738';


/* ═══════════════════════════════════════════════════════
   1. TELA DE LOGIN — marca JOB no lugar do logo do WordPress
═══════════════════════════════════════════════════════ */
function job_login_branding() {
    $logo = get_template_directory_uri() . '/img/logo-job-eng-branco.svg';
    ?>
    <style>
        body.login {
            background: <?php echo JOB_BLACK; ?>;
            background: radial-gradient(circle at 50% 0%, <?php echo JOB_GREEN; ?> 0%, <?php echo JOB_BLACK; ?> 70%);
        }
        .login h1 a {
            background-image: url('<?php echo esc_url( $logo ); ?>');
            background-size: contain;
            background-position: center;
            width: 280px;
            height: 110px;
            margin-bottom: 8px;
        }
        .login form {
            border: none;
            border-radius: 12px;
            box-shadow: 0 18px 50px rgba(0,0,0,.35);
        }
        .login label { color: <?php echo JOB_BLACK; ?>; }
        .login input[type=text]:focus,
        .login input[type=password]:focus {
            border-color: <?php echo JOB_GREEN2; ?>;
            box-shadow: 0 0 0 1px <?php echo JOB_GREEN2; ?>;
        }
        .wp-core-ui .button-primary {
            background: <?php echo JOB_GREEN; ?>;
            border-color: <?php echo JOB_GREEN; ?>;
            text-shadow: none;
            box-shadow: none;
        }
        .wp-core-ui .button-primary:hover,
        .wp-core-ui .button-primary:focus {
            background: <?php echo JOB_GREEN2; ?>;
            border-color: <?php echo JOB_GREEN2; ?>;
        }
        .login #nav a, .login #backtoblog a { color: #e6e6e6; }
        .login #nav a:hover, .login #backtoblog a:hover { color: #fff; }
        .login .message, .login .success { border-left-color: <?php echo JOB_GREEN2; ?>; }
    </style>
    <?php
}
add_action( 'login_enqueue_scripts', 'job_login_branding' );

/* O logo do login leva ao site (não ao wordpress.org) */
function job_login_logo_url() { return home_url( '/' ); }
add_filter( 'login_headerurl', 'job_login_logo_url' );

function job_login_logo_text() { return get_bloginfo( 'name' ); }
add_filter( 'login_headertext', 'job_login_logo_text' );


/* ═══════════════════════════════════════════════════════
   2. RODAPÉ DO ADMIN — personalizado
═══════════════════════════════════════════════════════ */
function job_admin_footer_text() {
    return 'Painel <strong>JOB Engenharia</strong> — em caso de dúvida, fale com seu suporte de site.';
}
add_filter( 'admin_footer_text', 'job_admin_footer_text' );

function job_admin_footer_version() { return ''; }
add_filter( 'update_footer', 'job_admin_footer_version', 11 );


/* ═══════════════════════════════════════════════════════
   3. PAINEL INICIAL — limpeza + widget de boas-vindas
═══════════════════════════════════════════════════════ */
function job_clean_dashboard() {
    remove_meta_box( 'dashboard_primary',     'dashboard', 'side' );   // Eventos e Novidades do WordPress
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );   // Rascunho rápido
    remove_meta_box( 'dashboard_activity',    'dashboard', 'normal' ); // Atividade
    remove_meta_box( 'dashboard_right_now',   'dashboard', 'normal' ); // De relance
    remove_meta_box( 'dashboard_php_nag',     'dashboard', 'normal' ); // Aviso de PHP

    remove_action( 'welcome_panel', 'wp_welcome_panel' );

    add_meta_box(
        'job_boas_vindas',
        'Bem-vindo ao painel da JOB Engenharia',
        'job_dashboard_widget',
        'dashboard',
        'normal',
        'high'
    );
}
add_action( 'wp_dashboard_setup', 'job_clean_dashboard' );

function job_dashboard_widget() {
    $atalhos = [
        [
            'titulo' => 'Páginas do site',
            'desc'   => 'Editar os textos das páginas (Sobre, Serviços, etc.).',
            'url'    => admin_url( 'edit.php?post_type=page' ),
            'icone'  => 'dashicons-admin-page',
            'cap'    => 'edit_pages',
        ],
        [
            'titulo' => 'Contato e redes',
            'desc'   => 'Telefone, e-mail, horário e redes sociais.',
            'url'    => admin_url( 'admin.php?page=job-contato' ),
            'icone'  => 'dashicons-phone',
            'cap'    => 'edit_pages',
        ],
        [
            'titulo' => 'Imagens',
            'desc'   => 'Enviar e organizar as fotos do site.',
            'url'    => admin_url( 'upload.php' ),
            'icone'  => 'dashicons-format-gallery',
            'cap'    => 'upload_files',
        ],
    ];

    // Mensagens dos formulários — só quando o Fluent Forms estiver ativo
    if ( function_exists( 'wpFluentForm' ) ) {
        $atalhos[] = [
            'titulo' => 'Mensagens recebidas',
            'desc'   => 'Contatos enviados pelos formulários do site.',
            'url'    => admin_url( 'admin.php?page=fluent_forms_all_entries' ),
            'icone'  => 'dashicons-email-alt',
            'cap'    => 'edit_pages',
        ];
    }
    ?>
    <style>
        #job_boas_vindas .inside { margin: 0; padding: 0; }
        .job-dash-intro {
            padding: 14px 16px;
            border-left: 4px solid <?php echo JOB_GREEN; ?>;
            background: #f6faf7;
            color: #3c434a;
            font-size: 13px;
        }
        .job-dash-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 12px;
            padding: 16px;
        }
        .job-dash-card {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            padding: 14px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            text-decoration: none;
            color: <?php echo JOB_BLACK; ?>;
            background: #fff;
            transition: border-color .15s, box-shadow .15s, transform .15s;
        }
        .job-dash-card:hover {
            border-color: <?php echo JOB_GREEN2; ?>;
            box-shadow: 0 6px 18px rgba(0,102,47,.12);
            transform: translateY(-2px);
            color: <?php echo JOB_BLACK; ?>;
        }
        .job-dash-card .dashicons {
            color: <?php echo JOB_GREEN; ?>;
            font-size: 26px;
            width: 26px;
            height: 26px;
            flex: none;
        }
        .job-dash-card b { display: block; font-size: 14px; margin-bottom: 2px; }
        .job-dash-card .d { font-size: 12px; color: #50575e; line-height: 1.4; }
    </style>

    <div class="job-dash-intro">
        Use os atalhos abaixo para cuidar do conteúdo do site. Qualquer dúvida, é só chamar o suporte.
    </div>

    <div class="job-dash-grid">
        <?php foreach ( $atalhos as $a ) : ?>
            <?php if ( ! empty( $a['cap'] ) && ! current_user_can( $a['cap'] ) ) continue; ?>
            <a class="job-dash-card" href="<?php echo esc_url( $a['url'] ); ?>">
                <span class="dashicons <?php echo esc_attr( $a['icone'] ); ?>"></span>
                <span>
                    <b><?php echo esc_html( $a['titulo'] ); ?></b>
                    <span class="d"><?php echo esc_html( $a['desc'] ); ?></span>
                </span>
            </a>
        <?php endforeach; ?>
    </div>
    <?php
}


/* ═══════════════════════════════════════════════════════
   4. PÁGINA "CONTATO E REDES" — acessível ao cliente (Editor)
   Grava nos MESMOS theme_mods do Personalizar (campos definidos em
   job_contato_campos() no functions.php). O helper jg() lê daqui, então
   o que o cliente salvar aqui aparece no rodapé e nas seções de contato.
═══════════════════════════════════════════════════════ */
function job_contato_menu() {
    add_menu_page(
        'Contato e Redes',
        'Contato e Redes',
        'edit_pages',
        'job-contato',
        'job_contato_page',
        'dashicons-phone',
        21
    );
}
add_action( 'admin_menu', 'job_contato_menu' );

function job_contato_page() {
    if ( ! current_user_can( 'edit_pages' ) ) return;
    if ( ! function_exists( 'job_contato_campos' ) ) return;
    $campos = job_contato_campos();

    if ( isset( $_POST['job_contato_nonce'] )
         && wp_verify_nonce( $_POST['job_contato_nonce'], 'job_contato_salvar' ) ) {
        foreach ( $campos as $chave => $c ) {
            $raw = isset( $_POST[ $chave ] ) ? wp_unslash( $_POST[ $chave ] ) : '';
            set_theme_mod( $chave, call_user_func( $c[2], $raw ) );
        }
        echo '<div class="notice notice-success is-dismissible"><p>'
           . 'Contatos atualizados! As mudanças já aparecem no site.</p></div>';
    }
    ?>
    <div class="wrap">
        <h1>
            <span class="dashicons dashicons-phone" style="font-size:30px;width:30px;height:30px;color:<?php echo JOB_GREEN; ?>;vertical-align:-4px;"></span>
            Contato e Redes
        </h1>
        <p>Esses dados aparecem no rodapé e nas seções de contato do site. Edite e clique em <strong>Salvar</strong>.</p>
        <form method="post">
            <?php wp_nonce_field( 'job_contato_salvar', 'job_contato_nonce' ); ?>
            <table class="form-table" role="presentation">
                <?php foreach ( $campos as $chave => $c ) :
                    $val = get_theme_mod( $chave, $c[1] ); ?>
                    <tr>
                        <th scope="row">
                            <label for="<?php echo esc_attr( $chave ); ?>"><?php echo esc_html( $c[0] ); ?></label>
                        </th>
                        <td>
                            <input name="<?php echo esc_attr( $chave ); ?>"
                                   id="<?php echo esc_attr( $chave ); ?>"
                                   type="text" class="regular-text"
                                   value="<?php echo esc_attr( $val ); ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php submit_button( 'Salvar contatos' ); ?>
        </form>
    </div>
    <?php
}
