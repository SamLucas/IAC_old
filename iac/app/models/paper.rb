class Paper < ApplicationRecord
	paginates_per 10
	belongs_to :search_line
	has_one_attached :file
end
