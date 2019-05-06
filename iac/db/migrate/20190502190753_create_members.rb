class CreateMembers < ActiveRecord::Migration[5.1]
  def change
    create_table :members do |t|
      t.string :description
      t.text :formation
      t.string :link_to_lattes

      t.timestamps
    end
  end
end
