json.extract! paper, :id, :author, :description, :title, :search_lines_id, :created_at, :updated_at
json.url paper_url(paper, format: :json)
