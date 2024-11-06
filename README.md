=== Block Guess 404 Redirect ===
Contributors: Willy Elvis
Tags: redirecionamento, 404, URL, WordPress
Requires at least: 4.0
Tested up to: 6.2
Stable tag: 1.0.0

== Description ==
Este plugin impede o redirecionamento para URLs incompletas ou erradas no WordPress e força a exibição da página 404 diretamente.

== Installation ==
1. Baixe o arquivo do plugin.
2. Carregue a pasta para o diretório wp-content/plugins.
3. Ative o plugin na página de plugins do WordPress.
4. Acesse o menu "Redirecionamento 404" no painel do WordPress para configurar o comportamento.

== Changelog ==
= 1.0.0 =
* Primeira versão do plugin.

Observações: Você pode simplemente adicionar esse filtro "add_filter( 'do_redirect_guess_404_permalink', '__return_false' );" no arquivo functions.php. 
