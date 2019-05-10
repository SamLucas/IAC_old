json.extract! site_text, :id, :title, :description, :identification, :created_at, :updated_at
json.url site_text_url(site_text, format: :json)
