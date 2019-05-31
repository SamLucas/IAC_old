require "application_system_test_case"

class DisclosuresTest < ApplicationSystemTestCase
  setup do
    @disclosure = disclosures(:one)
  end

  test "visiting the index" do
    visit disclosures_url
    assert_selector "h1", text: "Disclosures"
  end

  test "creating a Disclosure" do
    visit disclosures_url
    click_on "New Disclosure"

    check "Active" if @disclosure.active
    fill_in "Author", with: @disclosure.author
    fill_in "Description", with: @disclosure.description
    fill_in "Textnew", with: @disclosure.textnew
    fill_in "Title", with: @disclosure.title
    click_on "Create Disclosure"

    assert_text "Disclosure was successfully created"
    click_on "Back"
  end

  test "updating a Disclosure" do
    visit disclosures_url
    click_on "Edit", match: :first

    check "Active" if @disclosure.active
    fill_in "Author", with: @disclosure.author
    fill_in "Description", with: @disclosure.description
    fill_in "Textnew", with: @disclosure.textnew
    fill_in "Title", with: @disclosure.title
    click_on "Update Disclosure"

    assert_text "Disclosure was successfully updated"
    click_on "Back"
  end

  test "destroying a Disclosure" do
    visit disclosures_url
    page.accept_confirm do
      click_on "Destroy", match: :first
    end

    assert_text "Disclosure was successfully destroyed"
  end
end
