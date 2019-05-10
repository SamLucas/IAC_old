# Be sure to restart your server when you modify this file.

# Version of your assets, change this if you want to expire all your assets.
Rails.application.config.assets.version = '1.0'

# Add additional assets to the asset load path.
# Rails.application.config.assets.paths << Emoji.images_path
# Add Yarn node_modules folder to the asset load path.
Rails.application.config.assets.paths << Rails.root.join('node_modules')

# Precompile additional assets.
# application.js, application.css, and all non-JS/CSS in the app/assets
# folder are already added.
# Rails.application.config.assets.precompile += %w( admin.js admin.css )

Rails.application.config.assets.precompile += %w( admins.js admins.css )

# Import files lib/js(backentd)
Rails.application.config.assets.precompile += %w(
	waves.js
	chart-page-init.js
	custom.js
	excanvas.js
	jquery.flot.crosshair.js
	jquery.flot.js
	jquery.flot.pie.js
	jquery.flot.stack.js
	jquery.flot.time.js
	jquery.flot.tooltip.js
	perfect.js
	popper.js
	sidebarmenu.js
	sparkline.js
)

# Import files lib/css(backentd)
Rails.application.config.assets.precompile += %w(
	materialdesignicons.css
	float-chart.css
	style.css
)

# Import files lib/img(backentd)
Rails.application.config.assets.precompile += %w(
	logo_iac.png
	1.jpg
	logo-icon.png
	logo-text.png
	custom-select.png
)

# Import files vendor/img(backentd)
Rails.application.config.assets.precompile += %w(
	1-member.jpg
	2-member.jpg
	3-member.jpg
	4-member.jpg
	5-member.jpg
	6-member.jpg
	7-member.jpg
	8-member.jpg
	9-member.jpg
	10-member.jpg
	11-member.jpg
	12-member.jpg
	13-member.jpg
	14-member.jpg
	15-member.jpg
	16-member.jpg
	17-member.jpg
	18-member.jpg
)

# Import files vendor/files/tcc(backentd)
Rails.application.config.assets.precompile += %w(
	CT_COTSI_2012_1_05.pdf
	DanielaPreto_TCCVersaoFINAL.pdf
	FERNANDO_BUSS_FRESCKI.pdf
	Gustavo_Oliveira_de_Oliveira_TCC.pdf
	main.pdf
	Monografia.pdf
	Monografia_Johann_Westphall.pdf
	MONOGRAFIA_Proposta_de_otimização_do_tráfego_da_rede_da_universidade_federal_de_lavras_utilizando_a_técnica_de_spanning_tree_protocol.pdf
	Paper_Ricardo_Rev_.pdf
	Portal_do_colaborador_-_Meu_Bridge.pdf
	R_-_E_-_REGINALDO_JOSE_ATISANO.pdf
	TCC-ArthurMachadoBranco-Final.pdf
	tcc0017.pdf
	TCC_(7).pdf
	TCC_-_Sistema_para_notarios_utilizando_blockchain.pdf
	TCC_Documento_Final.pdf
	TCC_Ile_comArtigoECodigo.pdf
	TCC_Jose_Luis_Conradi_Hoffmann.pdf
	TCC_Ricardo_Fritsche_Final.pdf
	Trabalho_de_Conclus_o_de_Curso___Maurilio_Atila_Carvalho_de_Santana.pdf
)