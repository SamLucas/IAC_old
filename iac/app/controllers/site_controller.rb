class SiteController < ApplicationController
	before_action :get_texto
	def index
		@textos
	end
	private 
	def get_texto
		@textos = SiteText.all
	end
end
