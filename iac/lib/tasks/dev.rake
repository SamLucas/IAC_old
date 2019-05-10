namespace :dev do

	DEFAULT_IMAGES_PATH = File.join(Rails.root, 'vendor', 'assets', 'images')
	DEFAULT_FILES_PATH = File.join(Rails.root, 'vendor', 'assets', 'files', 'tcc')
	
	desc "configurando ambiente de desenvolvimento."
	task setup: :environment do
		if Rails.env.development?
			show_spinner("Apagando BD...") { %x(rails db:drop) }
			show_spinner("Criando BD...") { %x(rails db:create) }
			show_spinner("Migrando Scripts BD...") { %x(rails db:migrate) }
			show_spinner("Migrando dados(Usuarios) no BD...") { %x(rails dev:add_members) }
			show_spinner("Migrando dados(Noicias) no BD...") { %x(rails dev:add_disclosures) }
			show_spinner("Migrando dados(Linhas de pesquisa) no BD...") { %x(rails dev:add_searchlines) }
			show_spinner("Migrando dados(Paper para as linhas de pesquisa) no BD...") { %x(rails dev:add_papers) }

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
			image_path = File.join(DEFAULT_IMAGES_PATH, image_name)
			membros.image.attach(io: File.open(image_path), filename: image_name)

		end
	end
	
	desc "Adiciona noticias aleatórias no BD."
	task add_disclosures: :environment do
		10.times do |i|

			paragraphs = rand(1..4);
			text = ""

			paragraphs.times do |p|
				text += "<p>#{Faker::Lorem.paragraph_by_chars(rand(250..500))}</p> "
			end

			Disclosure.create!(
				title: Faker::Lorem.sentence,
				description: Faker::Lorem.sentence(rand(0..8)),
				active: rand(0..1)? false : true,
				author: Faker::Name.name,
				textnew: "#{text}"
				)
		end
	end

	desc "Adiciona linhas de pesquisa aleatórias no BD."
	task add_searchlines: :environment do
		20.times do |i|	

			paragraphs = rand(3..6);
			text = ""

			paragraphs.times do |p|
				text += "<p>#{Faker::Lorem.paragraph_by_chars(rand(500..750))}</p> "
			end

			SearchLine.create!(
				title: Faker::Lorem.sentence,
				teacher: Faker::Name.name,
				description: text
				)
		end
	end

	desc "Adiciona papers aleatórios para as linhas de pesquisa no BD."
	task add_papers: :environment do

		tccs = [
			"CT_COTSI_2012_1_05.pdf",
			"DanielaPreto_TCCVersaoFINAL.pdf",
			"FERNANDO_BUSS_FRESCKI.pdf",
			"Gustavo_Oliveira_de_Oliveira_TCC.pdf",
			"main.pdf",
			"Monografia.pdf",
			"Monografia_Johann_Westphall.pdf",
			"MONOGRAFIA_Proposta_de_otimização_do_tráfego_da_rede_da_universidade_federal_de_lavras_utilizando_a_técnica_de_spanning_tree_protocol.pdf",
			"Paper_Ricardo_Rev_.pdf",
			"Portal_do_colaborador_-_Meu_Bridge.pdf",
			"R_-_E_-_REGINALDO_JOSE_ATISANO.pdf",
			"TCC-ArthurMachadoBranco-Final.pdf",
			"tcc0017.pdf",
			"TCC_(7).pdf",
			"TCC_-_Sistema_para_notarios_utilizando_blockchain.pdf",
			"TCC_Documento_Final.pdf",
			"TCC_Ile_comArtigoECodigo.pdf",
			"TCC_Jose_Luis_Conradi_Hoffmann.pdf",
			"TCC_Ricardo_Fritsche_Final.pdf",
			"Trabalho_de_Conclus_o_de_Curso___Maurilio_Atila_Carvalho_de_Santana.pdf"
		]

		pesquisas = SearchLine.all
		pesquisas.each do |searchline| 
			rand(1..3).times do |i|	

				paragraphs = rand(1..2);
				text = ""

				paragraphs.times do |p|
					text += "<p>#{Faker::Lorem.paragraph_by_chars(rand(250..500))}</p> "
				end

				Paper.create!(
					title: Faker::Lorem.sentence,
					author: Faker::Name.name,
					description: "#{text}",
					search_line_id: searchline.id
					)

				ultimo_paper = Paper.last
				paper_name = "#{tccs[rand(0..20)]}"
				paper_path = File.join(DEFAULT_FILES_PATH, paper_name)
				ultimo_paper.file.attach(io: File.open(paper_path), filename: paper_name)
				
			end
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
