class SearchLine < ApplicationRecord
	paginates_per 10
	has_many :papers
end
