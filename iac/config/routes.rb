Rails.application.routes.draw do

	resources :site_texts
	resources :papers
	resources :search_lines
	resources :disclosures
	resources :members
	resources :site
	resources :admins
	root to: 'site#index'

  # For details on the DSL available within this file, see http://guides.rubyonrails.org/routing.html
end