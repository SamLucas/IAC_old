class CreatePapers < ActiveRecord::Migration[5.2]
  def change
    create_table :papers do |t|
      t.string :author
      t.text :description
      t.string :title
      t.references :search_line, foreign_key: true

      t.timestamps
    end
  end
end
