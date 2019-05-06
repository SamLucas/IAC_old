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
	float-chart.css
	style.css
)

# Import files lib/img(backentd)
Rails.application.config.assets.precompile += %w(
	logo_iac.png
	1.jpg
	logo-icon.png
	logo-text.png
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

