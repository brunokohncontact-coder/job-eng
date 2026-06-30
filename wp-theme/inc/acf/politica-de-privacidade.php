<?php
/**
 * Campos editáveis da página "Política de Privacidade"
 * (page-politica-de-privacidade.php).
 *
 * Página de documento legal: quase todo o texto é editável em campos fixos
 * (sem criar/remover itens). Os títulos das seções, os parágrafos, os itens
 * de lista, os rótulos do topo e as estatísticas têm um campo cada.
 * Cada campo já vem com o texto atual (default_value), então o painel
 * mostra o conteúdo de hoje e só muda o que o cliente quiser.
 *
 * Atenção: os títulos das seções (h2) NÃO devem perder o número inicial
 * (1., 2., ...) pois o índice lateral e a âncora dependem da estrutura.
 */
if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

acf_add_local_field_group( [
    'key'    => 'group_politica-de-privacidade',
    'title'  => 'Conteúdo: Política de Privacidade',
    'fields' => [

        /* ============================ TOPO ============================ */
        [ 'key' => 'tab_politica-de-privacidade_topo', 'label' => 'Topo', 'type' => 'tab' ],
        [
            'key'           => 'field_politica-de-privacidade_kicker',
            'label'         => 'Rótulo do topo (chamada)',
            'name'          => 'politica-de-privacidade_kicker',
            'type'          => 'text',
            'instructions'  => 'Texto curto em destaque acima do título, ao lado do traço verde.',
            'default_value' => 'Documento legal · LGPD',
        ],
        [
            'key'           => 'field_politica-de-privacidade_titulo_l1',
            'label'         => 'Título (1ª linha)',
            'name'          => 'politica-de-privacidade_titulo_l1',
            'type'          => 'text',
            'instructions'  => 'Primeira linha do título principal (cor escura).',
            'default_value' => 'Política de',
        ],
        [
            'key'           => 'field_politica-de-privacidade_titulo_l2',
            'label'         => 'Título (2ª linha, verde)',
            'name'          => 'politica-de-privacidade_titulo_l2',
            'type'          => 'text',
            'instructions'  => 'Segunda linha do título principal (cor verde).',
            'default_value' => 'Privacidade.',
        ],
        [
            'key'           => 'field_politica-de-privacidade_meta_atualizacao_rotulo',
            'label'         => 'Estatística 1 — rótulo',
            'name'          => 'politica-de-privacidade_meta_atualizacao_rotulo',
            'type'          => 'text',
            'instructions'  => 'Rótulo da primeira linha do quadro de dados (o valor é preenchido automaticamente).',
            'default_value' => 'Atualização',
        ],
        [
            'key'           => 'field_politica-de-privacidade_meta_conformidade_rotulo',
            'label'         => 'Estatística 2 — rótulo',
            'name'          => 'politica-de-privacidade_meta_conformidade_rotulo',
            'type'          => 'text',
            'instructions'  => 'Rótulo da segunda linha do quadro de dados.',
            'default_value' => 'Conformidade',
        ],
        [
            'key'           => 'field_politica-de-privacidade_meta_conformidade_valor',
            'label'         => 'Estatística 2 — valor',
            'name'          => 'politica-de-privacidade_meta_conformidade_valor',
            'type'          => 'text',
            'instructions'  => 'Valor da segunda linha do quadro de dados.',
            'default_value' => 'LGPD · Lei 13.709/18',
        ],
        [
            'key'           => 'field_politica-de-privacidade_meta_secoes_rotulo',
            'label'         => 'Estatística 3 — rótulo',
            'name'          => 'politica-de-privacidade_meta_secoes_rotulo',
            'type'          => 'text',
            'instructions'  => 'Rótulo da terceira linha do quadro de dados.',
            'default_value' => 'Seções',
        ],
        [
            'key'           => 'field_politica-de-privacidade_meta_secoes_valor',
            'label'         => 'Estatística 3 — valor',
            'name'          => 'politica-de-privacidade_meta_secoes_valor',
            'type'          => 'text',
            'instructions'  => 'Valor da terceira linha do quadro de dados (número de seções).',
            'default_value' => '11',
        ],

        /* ====================== ÍNDICE LATERAL ====================== */
        [ 'key' => 'tab_politica-de-privacidade_indice', 'label' => 'Índice lateral', 'type' => 'tab' ],
        [
            'key'           => 'field_politica-de-privacidade_indice_titulo',
            'label'         => 'Título do índice',
            'name'          => 'politica-de-privacidade_indice_titulo',
            'type'          => 'text',
            'instructions'  => 'Pequeno rótulo acima da lista do índice lateral.',
            'default_value' => '// índice',
        ],
        [
            'key'           => 'field_politica-de-privacidade_indice_1',
            'label'         => 'Índice — item 1',
            'name'          => 'politica-de-privacidade_indice_1',
            'type'          => 'text',
            'instructions'  => 'Texto do link 1 do índice.',
            'default_value' => '1. Apresentação',
        ],
        [
            'key'           => 'field_politica-de-privacidade_indice_2',
            'label'         => 'Índice — item 2',
            'name'          => 'politica-de-privacidade_indice_2',
            'type'          => 'text',
            'default_value' => '2. Dados coletados',
        ],
        [
            'key'           => 'field_politica-de-privacidade_indice_3',
            'label'         => 'Índice — item 3',
            'name'          => 'politica-de-privacidade_indice_3',
            'type'          => 'text',
            'default_value' => '3. Finalidade',
        ],
        [
            'key'           => 'field_politica-de-privacidade_indice_4',
            'label'         => 'Índice — item 4',
            'name'          => 'politica-de-privacidade_indice_4',
            'type'          => 'text',
            'default_value' => '4. Base legal',
        ],
        [
            'key'           => 'field_politica-de-privacidade_indice_5',
            'label'         => 'Índice — item 5',
            'name'          => 'politica-de-privacidade_indice_5',
            'type'          => 'text',
            'default_value' => '5. Compartilhamento',
        ],
        [
            'key'           => 'field_politica-de-privacidade_indice_6',
            'label'         => 'Índice — item 6',
            'name'          => 'politica-de-privacidade_indice_6',
            'type'          => 'text',
            'default_value' => '6. Cookies',
        ],
        [
            'key'           => 'field_politica-de-privacidade_indice_7',
            'label'         => 'Índice — item 7',
            'name'          => 'politica-de-privacidade_indice_7',
            'type'          => 'text',
            'default_value' => '7. Direitos do titular',
        ],
        [
            'key'           => 'field_politica-de-privacidade_indice_8',
            'label'         => 'Índice — item 8',
            'name'          => 'politica-de-privacidade_indice_8',
            'type'          => 'text',
            'default_value' => '8. Segurança',
        ],
        [
            'key'           => 'field_politica-de-privacidade_indice_9',
            'label'         => 'Índice — item 9',
            'name'          => 'politica-de-privacidade_indice_9',
            'type'          => 'text',
            'default_value' => '9. Retenção',
        ],
        [
            'key'           => 'field_politica-de-privacidade_indice_10',
            'label'         => 'Índice — item 10',
            'name'          => 'politica-de-privacidade_indice_10',
            'type'          => 'text',
            'default_value' => '10. Encarregado (DPO)',
        ],
        [
            'key'           => 'field_politica-de-privacidade_indice_11',
            'label'         => 'Índice — item 11',
            'name'          => 'politica-de-privacidade_indice_11',
            'type'          => 'text',
            'default_value' => '11. Alterações',
        ],

        /* ===================== 1. APRESENTAÇÃO ===================== */
        [ 'key' => 'tab_politica-de-privacidade_s1', 'label' => '1. Apresentação', 'type' => 'tab' ],
        [
            'key'           => 'field_politica-de-privacidade_s1_titulo',
            'label'         => 'Título da seção 1',
            'name'          => 'politica-de-privacidade_s1_titulo',
            'type'          => 'text',
            'instructions'  => 'Mantenha o número "1." no início.',
            'default_value' => '1. Apresentação',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s1_p2',
            'label'         => 'Seção 1 — parágrafo 2',
            'name'          => 'politica-de-privacidade_s1_p2',
            'type'          => 'textarea',
            'rows'          => 3,
            'new_lines'     => '',
            'default_value' => 'Esta Política descreve como coletamos, usamos, compartilhamos e protegemos os dados pessoais de visitantes, clientes, fornecedores e candidatos a vagas. Ao utilizar nosso site, você declara estar ciente desta Política.',
        ],

        /* ================== 2. DADOS QUE COLETAMOS ================== */
        [ 'key' => 'tab_politica-de-privacidade_s2', 'label' => '2. Dados coletados', 'type' => 'tab' ],
        [
            'key'           => 'field_politica-de-privacidade_s2_titulo',
            'label'         => 'Título da seção 2',
            'name'          => 'politica-de-privacidade_s2_titulo',
            'type'          => 'text',
            'instructions'  => 'Mantenha o número "2." no início.',
            'default_value' => '2. Dados que coletamos',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s2_intro',
            'label'         => 'Seção 2 — texto introdutório',
            'name'          => 'politica-de-privacidade_s2_intro',
            'type'          => 'textarea',
            'rows'          => 2,
            'new_lines'     => '',
            'default_value' => 'Coletamos apenas os dados estritamente necessários para as finalidades descritas:',
        ],

        /* ============== 3. FINALIDADE DO TRATAMENTO =============== */
        [ 'key' => 'tab_politica-de-privacidade_s3', 'label' => '3. Finalidade', 'type' => 'tab' ],
        [
            'key'           => 'field_politica-de-privacidade_s3_titulo',
            'label'         => 'Título da seção 3',
            'name'          => 'politica-de-privacidade_s3_titulo',
            'type'          => 'text',
            'instructions'  => 'Mantenha o número "3." no início.',
            'default_value' => '3. Finalidade do tratamento',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s3_intro',
            'label'         => 'Seção 3 — texto introdutório',
            'name'          => 'politica-de-privacidade_s3_intro',
            'type'          => 'textarea',
            'rows'          => 2,
            'new_lines'     => '',
            'default_value' => 'Utilizamos seus dados pessoais para:',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s3_item1',
            'label'         => 'Seção 3 — item 1',
            'name'          => 'politica-de-privacidade_s3_item1',
            'type'          => 'text',
            'default_value' => 'Responder a solicitações de proposta, dúvidas e contatos comerciais;',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s3_item2',
            'label'         => 'Seção 3 — item 2',
            'name'          => 'politica-de-privacidade_s3_item2',
            'type'          => 'text',
            'default_value' => 'Avaliar candidaturas para vagas de emprego;',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s3_item3',
            'label'         => 'Seção 3 — item 3',
            'name'          => 'politica-de-privacidade_s3_item3',
            'type'          => 'text',
            'default_value' => 'Melhorar a navegação e a experiência do site;',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s3_item4',
            'label'         => 'Seção 3 — item 4',
            'name'          => 'politica-de-privacidade_s3_item4',
            'type'          => 'text',
            'default_value' => 'Cumprir obrigações legais e regulatórias;',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s3_item5',
            'label'         => 'Seção 3 — item 5',
            'name'          => 'politica-de-privacidade_s3_item5',
            'type'          => 'text',
            'default_value' => 'Prevenir fraudes e proteger nossa segurança e a de nossos visitantes.',
        ],

        /* ===================== 4. BASE LEGAL ===================== */
        [ 'key' => 'tab_politica-de-privacidade_s4', 'label' => '4. Base legal', 'type' => 'tab' ],
        [
            'key'           => 'field_politica-de-privacidade_s4_titulo',
            'label'         => 'Título da seção 4',
            'name'          => 'politica-de-privacidade_s4_titulo',
            'type'          => 'text',
            'instructions'  => 'Mantenha o número "4." no início.',
            'default_value' => '4. Base legal',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s4_intro',
            'label'         => 'Seção 4 — texto introdutório',
            'name'          => 'politica-de-privacidade_s4_intro',
            'type'          => 'textarea',
            'rows'          => 2,
            'new_lines'     => '',
            'default_value' => 'O tratamento de dados pessoais pela JOB Engenharia ocorre sob as seguintes bases legais previstas na LGPD:',
        ],

        /* ============== 5. COMPARTILHAMENTO DE DADOS ============== */
        [ 'key' => 'tab_politica-de-privacidade_s5', 'label' => '5. Compartilhamento', 'type' => 'tab' ],
        [
            'key'           => 'field_politica-de-privacidade_s5_titulo',
            'label'         => 'Título da seção 5',
            'name'          => 'politica-de-privacidade_s5_titulo',
            'type'          => 'text',
            'instructions'  => 'Mantenha o número "5." no início.',
            'default_value' => '5. Compartilhamento de dados',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s5_item1',
            'label'         => 'Seção 5 — item 1',
            'name'          => 'politica-de-privacidade_s5_item1',
            'type'          => 'text',
            'default_value' => 'Fornecedores de tecnologia que operam sob contrato de confidencialidade (hospedagem, e-mail, análise de site);',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s5_item2',
            'label'         => 'Seção 5 — item 2',
            'name'          => 'politica-de-privacidade_s5_item2',
            'type'          => 'text',
            'default_value' => 'Autoridades públicas, mediante requisição legal;',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s5_item3',
            'label'         => 'Seção 5 — item 3',
            'name'          => 'politica-de-privacidade_s5_item3',
            'type'          => 'text',
            'default_value' => 'Empresas parceiras envolvidas na execução de serviços, quando estritamente necessário.',
        ],

        /* ============ 6. COOKIES E TECNOLOGIAS SIMILARES ========== */
        [ 'key' => 'tab_politica-de-privacidade_s6', 'label' => '6. Cookies', 'type' => 'tab' ],
        [
            'key'           => 'field_politica-de-privacidade_s6_titulo',
            'label'         => 'Título da seção 6',
            'name'          => 'politica-de-privacidade_s6_titulo',
            'type'          => 'text',
            'instructions'  => 'Mantenha o número "6." no início.',
            'default_value' => '6. Cookies e tecnologias similares',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s6_p1',
            'label'         => 'Seção 6 — parágrafo',
            'name'          => 'politica-de-privacidade_s6_p1',
            'type'          => 'textarea',
            'rows'          => 4,
            'new_lines'     => '',
            'default_value' => 'Utilizamos cookies para garantir o funcionamento adequado do site, lembrar preferências e coletar estatísticas anônimas de uso. Você pode gerenciar ou desativar cookies nas configurações do seu navegador, ciente de que algumas funcionalidades poderão ficar limitadas.',
        ],

        /* ================= 7. DIREITOS DO TITULAR ================= */
        [ 'key' => 'tab_politica-de-privacidade_s7', 'label' => '7. Direitos do titular', 'type' => 'tab' ],
        [
            'key'           => 'field_politica-de-privacidade_s7_titulo',
            'label'         => 'Título da seção 7',
            'name'          => 'politica-de-privacidade_s7_titulo',
            'type'          => 'text',
            'instructions'  => 'Mantenha o número "7." no início.',
            'default_value' => '7. Direitos do titular',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s7_intro',
            'label'         => 'Seção 7 — texto introdutório',
            'name'          => 'politica-de-privacidade_s7_intro',
            'type'          => 'textarea',
            'rows'          => 2,
            'new_lines'     => '',
            'default_value' => 'De acordo com o art. 18 da LGPD, você tem direito a:',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s7_item1',
            'label'         => 'Seção 7 — item 1',
            'name'          => 'politica-de-privacidade_s7_item1',
            'type'          => 'text',
            'default_value' => 'Confirmar a existência de tratamento dos seus dados;',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s7_item2',
            'label'         => 'Seção 7 — item 2',
            'name'          => 'politica-de-privacidade_s7_item2',
            'type'          => 'text',
            'default_value' => 'Acessar, corrigir, atualizar ou complementar seus dados;',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s7_item3',
            'label'         => 'Seção 7 — item 3',
            'name'          => 'politica-de-privacidade_s7_item3',
            'type'          => 'text',
            'default_value' => 'Solicitar anonimização, bloqueio ou eliminação de dados desnecessários ou tratados em desconformidade;',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s7_item4',
            'label'         => 'Seção 7 — item 4',
            'name'          => 'politica-de-privacidade_s7_item4',
            'type'          => 'text',
            'default_value' => 'Solicitar portabilidade a outro fornecedor de serviço;',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s7_item5',
            'label'         => 'Seção 7 — item 5',
            'name'          => 'politica-de-privacidade_s7_item5',
            'type'          => 'text',
            'default_value' => 'Revogar consentimento a qualquer tempo;',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s7_item6',
            'label'         => 'Seção 7 — item 6',
            'name'          => 'politica-de-privacidade_s7_item6',
            'type'          => 'text',
            'default_value' => 'Apresentar reclamação à Autoridade Nacional de Proteção de Dados (ANPD).',
        ],

        /* =============== 8. SEGURANÇA DA INFORMAÇÃO ============== */
        [ 'key' => 'tab_politica-de-privacidade_s8', 'label' => '8. Segurança', 'type' => 'tab' ],
        [
            'key'           => 'field_politica-de-privacidade_s8_titulo',
            'label'         => 'Título da seção 8',
            'name'          => 'politica-de-privacidade_s8_titulo',
            'type'          => 'text',
            'instructions'  => 'Mantenha o número "8." no início.',
            'default_value' => '8. Segurança da informação',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s8_p1',
            'label'         => 'Seção 8 — parágrafo',
            'name'          => 'politica-de-privacidade_s8_p1',
            'type'          => 'textarea',
            'rows'          => 4,
            'new_lines'     => '',
            'default_value' => 'Adotamos medidas técnicas e organizacionais para proteger os dados pessoais contra acesso não autorizado, alteração, divulgação ou destruição. Apesar dos esforços, nenhum sistema é totalmente imune a falhas; em caso de incidente, comunicaremos os titulares afetados e a ANPD nos termos da legislação.',
        ],

        /* ================== 9. RETENÇÃO DOS DADOS ================= */
        [ 'key' => 'tab_politica-de-privacidade_s9', 'label' => '9. Retenção', 'type' => 'tab' ],
        [
            'key'           => 'field_politica-de-privacidade_s9_titulo',
            'label'         => 'Título da seção 9',
            'name'          => 'politica-de-privacidade_s9_titulo',
            'type'          => 'text',
            'instructions'  => 'Mantenha o número "9." no início.',
            'default_value' => '9. Retenção dos dados',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s9_p1',
            'label'         => 'Seção 9 — parágrafo',
            'name'          => 'politica-de-privacidade_s9_p1',
            'type'          => 'textarea',
            'rows'          => 4,
            'new_lines'     => '',
            'default_value' => 'Os dados pessoais são mantidos pelo tempo estritamente necessário ao cumprimento das finalidades para as quais foram coletados ou pelo prazo determinado por obrigação legal. Após esse período, os dados são eliminados ou anonimizados de forma segura.',
        ],

        /* ============ 10. ENCARREGADO (DPO) ====================== */
        [ 'key' => 'tab_politica-de-privacidade_s10', 'label' => '10. Encarregado (DPO)', 'type' => 'tab' ],
        [
            'key'           => 'field_politica-de-privacidade_s10_titulo',
            'label'         => 'Título da seção 10',
            'name'          => 'politica-de-privacidade_s10_titulo',
            'type'          => 'text',
            'instructions'  => 'Mantenha o número "10." no início.',
            'default_value' => '10. Encarregado pelo Tratamento de Dados (DPO)',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s10_intro',
            'label'         => 'Seção 10 — texto introdutório',
            'name'          => 'politica-de-privacidade_s10_intro',
            'type'          => 'textarea',
            'rows'          => 3,
            'new_lines'     => '',
            'default_value' => 'Em conformidade com o art. 41 da LGPD, a JOB Engenharia disponibiliza canal direto para comunicação com o Encarregado pelo Tratamento de Dados Pessoais:',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s10_nota',
            'label'         => 'Seção 10 — nota (rodapé pequeno)',
            'name'          => 'politica-de-privacidade_s10_nota',
            'type'          => 'text',
            'instructions'  => 'Nota cinza pequena abaixo dos contatos. Os dados de contato (e-mail/endereço/telefone) ficam fixos pois serão globais.',
            'default_value' => '/ nome e contato direto do DPO a definir com a empresa',
        ],

        /* =============== 11. ALTERAÇÕES DESTA POLÍTICA =========== */
        [ 'key' => 'tab_politica-de-privacidade_s11', 'label' => '11. Alterações', 'type' => 'tab' ],
        [
            'key'           => 'field_politica-de-privacidade_s11_titulo',
            'label'         => 'Título da seção 11',
            'name'          => 'politica-de-privacidade_s11_titulo',
            'type'          => 'text',
            'instructions'  => 'Mantenha o número "11." no início.',
            'default_value' => '11. Alterações desta Política',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s11_p1',
            'label'         => 'Seção 11 — parágrafo',
            'name'          => 'politica-de-privacidade_s11_p1',
            'type'          => 'textarea',
            'rows'          => 4,
            'new_lines'     => '',
            'default_value' => 'Esta Política de Privacidade pode ser atualizada periodicamente. Recomendamos a consulta regular a esta página. A data da última atualização está indicada no topo. Alterações relevantes serão comunicadas pelos canais oficiais da empresa.',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s11_relacionados_rotulo',
            'label'         => 'Seção 11 — rótulo "Termos relacionados"',
            'name'          => 'politica-de-privacidade_s11_relacionados_rotulo',
            'type'          => 'text',
            'instructions'  => 'Rótulo em negrito antes do link de Termos de Uso (o link em si fica fixo).',
            'default_value' => 'Termos relacionados:',
        ],
        [
            'key'           => 'field_politica-de-privacidade_s11_relacionados_link',
            'label'         => 'Seção 11 — texto do link de Termos',
            'name'          => 'politica-de-privacidade_s11_relacionados_link',
            'type'          => 'text',
            'instructions'  => 'Texto exibido no link para a página de Termos de Uso.',
            'default_value' => 'Termos de Uso',
        ],

        /* ===================== LEGADO (não usar) ===================== */
        [ 'key' => 'tab_politica-de-privacidade_corpo', 'label' => 'Legado (não usar)', 'type' => 'tab' ],

    ],
    'location' => [ [ [
        'param'    => 'page',
        'operator' => '==',
        'value'    => 3,
    ] ] ],
    'menu_order'            => 0,
    'position'              => 'normal',
    'label_placement'       => 'top',
    'instruction_placement' => 'label',
    'active'                => true,
] );
