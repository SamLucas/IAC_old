namespace :dev do
	
	DEFAULT_FILES_PATH = File.join(Rails.root, 'vendor', 'assets', 'images')

	desc "configurando ambiente de desenvolvimento."
	task setup: :environment do
		if Rails.env.development?
			show_spinner("Apagando BD...") { %x(rails db:drop) }
			show_spinner("Criando BD...") { %x(rails db:create) }
			show_spinner("Migrando Scripts BD...") { %x(rails db:migrate) }
			show_spinner("Migrando dados(Usuarios) no BD...") { %x(rails dev:add_members) }
		else
			puts "Você não esta no mode de desenvolvimento."
		end
	end
	desc "Adiciona membros aleatórios no BD."
	task add_members: :environment do
		15.times do |i|
			
			Member.create!(
				description: Faker::Name.name,
				formation: "<p>#{Faker::Lorem.paragraph_by_chars(rand(500..770))}</p> <p>#{Faker::Lorem.paragraph_by_chars(rand(500..770))}</p>",
				link_to_lattes: Faker::Internet.url('lattes.com')
			)

			membros = Member.last	
			image_name = "#{rand(1..18)}-member.jpg"
			image_path = File.join(DEFAULT_FILES_PATH, image_name)
			membros.image.attach(io: File.open(image_path), filename: image_name)

		end
	end
	private
	def show_spinner(msg_start)
		spinner = TTY::Spinner.new("[:spinner] #{msg_start}")
		spinner.auto_spin
		yield
		spinner.success("(Concluido!)")
	end
end
