class SiteController < ApplicationController
	before_action :get_texto
	layout 'site'
	def index
		@textos
		@membros = Member.all
	end
	private 
	def get_texto
		@textos = SiteText.all
	end
end
