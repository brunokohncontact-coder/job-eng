<?php
/**
 * Campos editáveis da página Termos de Uso (page-termos-de-uso.php).
 * Página de texto longo / legal: o corpo principal é um único campo wysiwyg
 * (HTML), mais o rótulo curto do topo. Cada campo já vem com o texto atual
 * (default_value), então o cliente vê o conteúdo de hoje e edita o que quiser.
 */
if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

acf_add_local_field_group( [
    'key'    => 'group_termos-de-uso',
    'title'  => 'Conteúdo: Termos de Uso',
    'fields' => [

        [ 'key' => 'tab_termos-de-uso_topo', 'label' => 'Topo', 'type' => 'tab' ],
        [
            'key'           => 'field_termos-de-uso_eyebrow',
            'label'         => 'Rótulo do topo',
            'name'          => 'termos-de-uso_eyebrow',
            'type'          => 'text',
            'instructions'  => 'Texto curto em destaque acima do título (ex.: “Documento legal”).',
            'default_value' => 'Documento legal',
        ],
        [
            'key'           => 'field_termos-de-uso_titulo_l1',
            'label'         => 'Título — linha 1',
            'name'          => 'termos-de-uso_titulo_l1',
            'type'          => 'text',
            'instructions'  => 'Primeira linha do título grande (ex.: “Termos”).',
            'default_value' => 'Termos',
        ],
        [
            'key'           => 'field_termos-de-uso_titulo_l2',
            'label'         => 'Título — linha 2 (início)',
            'name'          => 'termos-de-uso_titulo_l2',
            'type'          => 'text',
            'instructions'  => 'Começo da segunda linha do título, em preto (ex.: “de”).',
            'default_value' => 'de',
        ],
        [
            'key'           => 'field_termos-de-uso_titulo_l3',
            'label'         => 'Título — linha 2 (destaque verde)',
            'name'          => 'termos-de-uso_titulo_l3',
            'type'          => 'text',
            'instructions'  => 'Palavra final do título, exibida em verde (ex.: “Uso.”).',
            'default_value' => 'Uso.',
        ],
        [
            'key'           => 'field_termos-de-uso_meta1_rotulo',
            'label'         => 'Bloco lateral 1 — rótulo',
            'name'          => 'termos-de-uso_meta1_rotulo',
            'type'          => 'text',
            'instructions'  => 'Rótulo do primeiro item do bloco à direita (ex.: “Atualização”).',
            'default_value' => 'Atualização',
        ],
        [
            'key'           => 'field_termos-de-uso_meta1_valor',
            'label'         => 'Bloco lateral 1 — valor',
            'name'          => 'termos-de-uso_meta1_valor',
            'type'          => 'text',
            'instructions'  => 'Valor do primeiro item (ex.: a data da última atualização).',
            'default_value' => 'a confirmar',
        ],
        [
            'key'           => 'field_termos-de-uso_meta2_rotulo',
            'label'         => 'Bloco lateral 2 — rótulo',
            'name'          => 'termos-de-uso_meta2_rotulo',
            'type'          => 'text',
            'instructions'  => 'Rótulo do segundo item do bloco à direita (ex.: “Aplicação”).',
            'default_value' => 'Aplicação',
        ],
        [
            'key'           => 'field_termos-de-uso_meta2_valor',
            'label'         => 'Bloco lateral 2 — valor',
            'name'          => 'termos-de-uso_meta2_valor',
            'type'          => 'text',
            'instructions'  => 'Valor do segundo item (ex.: “job.eng.br”).',
            'default_value' => 'job.eng.br',
        ],

        [ 'key' => 'tab_termos-de-uso_indice', 'label' => 'Índice lateral', 'type' => 'tab' ],
        [
            'key'           => 'field_termos-de-uso_indice_titulo',
            'label'         => 'Título do índice',
            'name'          => 'termos-de-uso_indice_titulo',
            'type'          => 'text',
            'instructions'  => 'Rótulo acima da lista de links lateral (ex.: “// índice”).',
            'default_value' => '// índice',
        ],
        [
            'key'           => 'field_termos-de-uso_indice_1',
            'label'         => 'Índice — link 1',
            'name'          => 'termos-de-uso_indice_1',
            'type'          => 'text',
            'instructions'  => 'Texto do link que leva à seção 1. (Apenas o rótulo; o link é mantido.)',
            'default_value' => '1. Aceitação',
        ],
        [
            'key'           => 'field_termos-de-uso_indice_2',
            'label'         => 'Índice — link 2',
            'name'          => 'termos-de-uso_indice_2',
            'type'          => 'text',
            'instructions'  => 'Texto do link que leva à seção 2.',
            'default_value' => '2. Uso permitido',
        ],
        [
            'key'           => 'field_termos-de-uso_indice_3',
            'label'         => 'Índice — link 3',
            'name'          => 'termos-de-uso_indice_3',
            'type'          => 'text',
            'instructions'  => 'Texto do link que leva à seção 3.',
            'default_value' => '3. Conteúdo do site',
        ],
        [
            'key'           => 'field_termos-de-uso_indice_4',
            'label'         => 'Índice — link 4',
            'name'          => 'termos-de-uso_indice_4',
            'type'          => 'text',
            'instructions'  => 'Texto do link que leva à seção 4.',
            'default_value' => '4. Propriedade intelectual',
        ],
        [
            'key'           => 'field_termos-de-uso_indice_5',
            'label'         => 'Índice — link 5',
            'name'          => 'termos-de-uso_indice_5',
            'type'          => 'text',
            'instructions'  => 'Texto do link que leva à seção 5.',
            'default_value' => '5. Limitação de responsabilidade',
        ],
        [
            'key'           => 'field_termos-de-uso_indice_6',
            'label'         => 'Índice — link 6',
            'name'          => 'termos-de-uso_indice_6',
            'type'          => 'text',
            'instructions'  => 'Texto do link que leva à seção 6.',
            'default_value' => '6. Links externos',
        ],
        [
            'key'           => 'field_termos-de-uso_indice_7',
            'label'         => 'Índice — link 7',
            'name'          => 'termos-de-uso_indice_7',
            'type'          => 'text',
            'instructions'  => 'Texto do link que leva à seção 7.',
            'default_value' => '7. Privacidade',
        ],
        [
            'key'           => 'field_termos-de-uso_indice_8',
            'label'         => 'Índice — link 8',
            'name'          => 'termos-de-uso_indice_8',
            'type'          => 'text',
            'instructions'  => 'Texto do link que leva à seção 8.',
            'default_value' => '8. Modificações',
        ],
        [
            'key'           => 'field_termos-de-uso_indice_9',
            'label'         => 'Índice — link 9',
            'name'          => 'termos-de-uso_indice_9',
            'type'          => 'text',
            'instructions'  => 'Texto do link que leva à seção 9.',
            'default_value' => '9. Lei aplicável',
        ],
        [
            'key'           => 'field_termos-de-uso_indice_10',
            'label'         => 'Índice — link 10',
            'name'          => 'termos-de-uso_indice_10',
            'type'          => 'text',
            'instructions'  => 'Texto do link que leva à seção 10.',
            'default_value' => '10. Contato',
        ],

        [ 'key' => 'tab_termos-de-uso_corpo', 'label' => 'Corpo do documento', 'type' => 'tab' ],
        [
            'key'           => 'field_termos-de-uso_corpo',
            'label'         => 'Texto dos Termos de Uso',
            'name'          => 'termos-de-uso_corpo',
            'type'          => 'wysiwyg',
            'tabs'          => 'all',
            'toolbar'       => 'full',
            'media_upload'  => 0,
            'instructions'  => 'Corpo completo dos Termos de Uso (as seções numeradas). Use os títulos e listas do editor; o visual da página é mantido automaticamente.',
            'default_value' => '<div id="s1">
          <h2>1. Aceitação dos termos</h2>
          <p>
            Ao acessar e utilizar o site <strong>job.eng.br</strong>, mantido pela
            <strong>JOB Engenharia</strong> (CNPJ [a ser confirmado]), você declara ter
            lido, compreendido e aceito integralmente estes Termos de Uso, bem como nossa
            <a href="/politica-de-privacidade/">Política de Privacidade</a>. Caso não
            concorde com qualquer das condições aqui descritas, solicitamos que não utilize o site.
          </p>
        </div>

        <div id="s2">
          <h2>2. Uso permitido</h2>
          <p>O site é disponibilizado para fins informativos e comerciais lícitos. O usuário compromete-se a:</p>
          <ul>
            <li>Utilizar o site apenas para finalidades legais e em conformidade com a legislação brasileira;</li>
            <li>Não realizar qualquer ato que comprometa a segurança, integridade ou disponibilidade do site;</li>
            <li>Não reproduzir, distribuir ou modificar conteúdos sem autorização prévia;</li>
            <li>Fornecer informações verdadeiras, atuais e precisas em formulários ou candidaturas;</li>
            <li>Não utilizar o site para envio de mensagens não solicitadas, conteúdo ofensivo ou ilegal.</li>
          </ul>
        </div>

        <div id="s3">
          <h2>3. Conteúdo do site</h2>
          <p>
            Os textos, dados técnicos, especificações de equipamentos, fotografias e demais materiais
            disponibilizados têm caráter informativo. A JOB Engenharia esforça-se para manter as
            informações atualizadas, mas não garante ausência de imprecisões e reserva-se o direito de
            corrigir, alterar ou remover qualquer conteúdo a qualquer tempo, sem aviso prévio.
          </p>
          <p>
            As informações sobre serviços e tecnologias não constituem proposta comercial vinculante.
            Propostas formais são emitidas mediante contato direto com nossa equipe.
          </p>
        </div>

        <div id="s4">
          <h2>4. Propriedade intelectual</h2>
          <p>
            Todo o conteúdo deste site — incluindo textos, marcas, logotipos, imagens, ícones, fotografias,
            ilustrações, projetos gráficos, vídeos e código-fonte — é de propriedade da JOB Engenharia ou
            licenciado a ela, sendo protegido pelas leis brasileiras de propriedade intelectual e pelas
            convenções internacionais aplicáveis.
          </p>
          <p>
            É vedada a reprodução, distribuição, modificação, transmissão, exibição pública ou qualquer
            outro uso de tais conteúdos sem autorização prévia, expressa e por escrito da JOB Engenharia.
            O uso indevido sujeita o infrator às sanções civis e criminais cabíveis.
          </p>
        </div>

        <div id="s5">
          <h2>5. Limitação de responsabilidade</h2>
          <p>A JOB Engenharia não se responsabiliza por:</p>
          <ul>
            <li>Indisponibilidade temporária do site decorrente de manutenção, falhas de provedor, força maior ou caso fortuito;</li>
            <li>Vírus, malware ou qualquer dano ao equipamento do usuário decorrente do acesso ao site, recomendando-se manter ferramentas de segurança ativas;</li>
            <li>Decisões tomadas pelo usuário com base em conteúdos meramente informativos, sem consulta prévia à equipe técnica;</li>
            <li>Conteúdo de sites de terceiros eventualmente acessados a partir de links no site.</li>
          </ul>
        </div>

        <div id="s6">
          <h2>6. Links externos</h2>
          <p>
            O site pode conter links para sites de terceiros, oferecidos exclusivamente para conveniência
            do usuário. A JOB Engenharia não controla nem se responsabiliza por conteúdo, políticas de
            privacidade ou práticas de tais sites externos. O acesso ocorre por conta e risco do usuário.
          </p>
        </div>

        <div id="s7">
          <h2>7. Privacidade e proteção de dados</h2>
          <p>
            O tratamento de dados pessoais coletados por meio do site é regulado por nossa
            <a href="/politica-de-privacidade/">Política de Privacidade</a>, parte integrante destes
            Termos. Recomenda-se sua leitura atenta antes do envio de qualquer informação.
          </p>
        </div>

        <div id="s8">
          <h2>8. Modificações dos termos</h2>
          <p>
            A JOB Engenharia poderá alterar estes Termos de Uso a qualquer momento, com efeito imediato
            a partir da publicação no site. Alterações relevantes serão sinalizadas pela atualização da
            data indicada no topo desta página. O uso continuado do site após qualquer modificação
            implica aceitação dos novos termos.
          </p>
        </div>

        <div id="s9">
          <h2>9. Lei aplicável e foro</h2>
          <p>
            Estes Termos são regidos pelas leis da <strong>República Federativa do Brasil</strong>.
            Fica eleito o foro da Comarca de <strong>Santana de Parnaíba — SP</strong> para dirimir
            quaisquer controvérsias decorrentes da interpretação ou aplicação destes Termos, com
            renúncia a qualquer outro, por mais privilegiado que seja.
          </p>
        </div>

        <div id="s10">
          <h2>10. Contato</h2>
          <p>Em caso de dúvidas sobre estes Termos de Uso, entre em contato:</p>
          <ul>
            <li><strong>E-mail:</strong> <a href="mailto:contato@jobeng.com.br">contato@jobeng.com.br</a></li>
            <li><strong>Telefone:</strong> (11) 2207-9212</li>
            <li><strong>Endereço:</strong> Av. Marcos Penteado de Ulhoa Rodrigues, 1119 — Sala 812, Tamboré, Santana de Parnaíba — SP, 06460-040</li>
            <li><strong>Atendimento:</strong> Segunda a sexta, das 9h às 18h</li>
          </ul>
          <p style="margin-top:24px;padding-top:16px;border-top:1px solid #e5e7eb;font-size:13px;">
            <strong>Veja também:</strong>
            <a href="/politica-de-privacidade/">Política de Privacidade</a>.
          </p>
        </div>',
        ],

    ],
    'location' => [ [ [
        'param'    => 'page',
        'operator' => '==',
        'value'    => 12,
    ] ] ],
    'menu_order'            => 0,
    'position'              => 'normal',
    'label_placement'       => 'top',
    'instruction_placement' => 'label',
    'active'                => true,
] );
