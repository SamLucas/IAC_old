class CreateDisclosures < ActiveRecord::Migration[5.2]
  def change
    create_table :disclosures do |t|
      t.string :title
      t.boolean :active, default: false
      t.string :description
      t.string :author
      t.text :textnew

      t.timestamps
    end
  end
end
