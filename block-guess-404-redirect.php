<?php
/**
 * Plugin Name: Block Shorts Url
 * Description: Impede o WordPress de redirecionar para URLs incompletas ou erradas e força a exibição de uma página 404.
 * Version: 1.0.0
 * Author: Willy Elvis
 * Author URI: 
 * License: GPL2
 */

// Evita o redirecionamento para URLs incompletas ou erradas
add_filter( 'do_redirect_guess_404_permalink', 'bgr_disable_guess_redirect' );

// Função que desativa o redirecionamento
function bgr_disable_guess_redirect() {
    return false;
}

// Adiciona o menu de configurações ao painel do WordPress
function bgr_add_admin_menu() {
    add_menu_page(
        'Configurações de Redirecionamento 404', // Título da página
        'Redirecionamento 404', // Título do menu
        'manage_options', // Permissão necessária
        'bgr-settings', // Slug do menu
        'bgr_settings_page', // Função que exibe a página de configurações
        'dashicons-admin-generic', // Ícone do menu
        80 // Posição do menu
    );
}
add_action('admin_menu', 'bgr_add_admin_menu');

// Função que exibe a página de configurações do plugin
function bgr_settings_page() {
    ?>
    <div class="wrap">
        <h1>Configurações de Redirecionamento 404</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('bgr_settings_group');
            do_settings_sections('bgr-settings');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Desativar Redirecionamento para URLs Inexistentes</th>
                    <td>
                        <input type="checkbox" name="bgr_disable_redirect" value="1" <?php checked(1, get_option('bgr_disable_redirect'), true); ?> />
                        <label for="bgr_disable_redirect">Ativar para impedir redirecionamento para URLs incompletas</label>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Registra as opções de configuração no banco de dados
function bgr_register_settings() {
    register_setting('bgr_settings_group', 'bgr_disable_redirect');
}
add_action('admin_init', 'bgr_register_settings');

// Ativa ou desativa o filtro com base na configuração do usuário
function bgr_apply_disable_redirect_filter() {
    if (get_option('bgr_disable_redirect') == 1) {
        add_filter('do_redirect_guess_404_permalink', '__return_false');
    }
}
add_action('init', 'bgr_apply_disable_redirect_filter');

