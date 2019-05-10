require "application_system_test_case"

class SiteTextsTest < ApplicationSystemTestCase
  setup do
    @site_text = site_texts(:one)
  end

  test "visiting the index" do
    visit site_texts_url
    assert_selector "h1", text: "Site Texts"
  end

  test "creating a Site text" do
    visit site_texts_url
    click_on "New Site Text"

    fill_in "Description", with: @site_text.description
    fill_in "Identification", with: @site_text.identification
    fill_in "Title", with: @site_text.title
    click_on "Create Site text"

    assert_text "Site text was successfully created"
    click_on "Back"
  end

  test "updating a Site text" do
    visit site_texts_url
    click_on "Edit", match: :first

    fill_in "Description", with: @site_text.description
    fill_in "Identification", with: @site_text.identification
    fill_in "Title", with: @site_text.title
    click_on "Update Site text"

    assert_text "Site text was successfully updated"
    click_on "Back"
  end

  test "destroying a Site text" do
    visit site_texts_url
    page.accept_confirm do
      click_on "Destroy", match: :first
    end

    assert_text "Site text was successfully destroyed"
  end
end
