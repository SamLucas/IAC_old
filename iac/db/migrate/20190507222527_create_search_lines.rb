class CreateSearchLines < ActiveRecord::Migration[5.2]
  def change
    create_table :search_lines do |t|
      t.string :title
      t.string :teacher
      t.text :description

      t.timestamps
    end
  end
end
