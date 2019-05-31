class CreateSiteTexts < ActiveRecord::Migration[5.2]
  def change
    create_table :site_texts do |t|
      t.string :title
      t.text :description
      t.string :identification

      t.timestamps
    end
  end
end
