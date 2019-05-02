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

# locale app/assets
Rails.application.config.assets.precompile += %w( 
    admins_backoffice.css
    admins_backoffice.js
    users_backoffice.css
    users_backoffice.js
)

# locale lib/assets/sb-admin
Rails.application.config.assets.precompile += %w( 
    sb-admin-2.css 
    sb-admin-2.js
    fonts_google.css 
)

# locale lib/assets/gentella
Rails.application.config.assets.precompile += %w( 
    gentella.css
    gentella.js
    img.jpg
)