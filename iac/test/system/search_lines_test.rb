require "application_system_test_case"

class SearchLinesTest < ApplicationSystemTestCase
  setup do
    @search_line = search_lines(:one)
  end

  test "visiting the index" do
    visit search_lines_url
    assert_selector "h1", text: "Search Lines"
  end

  test "creating a Search line" do
    visit search_lines_url
    click_on "New Search Line"

    fill_in "Description", with: @search_line.description
    fill_in "Teacher", with: @search_line.teacher
    fill_in "Title", with: @search_line.title
    click_on "Create Search line"

    assert_text "Search line was successfully created"
    click_on "Back"
  end

  test "updating a Search line" do
    visit search_lines_url
    click_on "Edit", match: :first

    fill_in "Description", with: @search_line.description
    fill_in "Teacher", with: @search_line.teacher
    fill_in "Title", with: @search_line.title
    click_on "Update Search line"

    assert_text "Search line was successfully updated"
    click_on "Back"
  end

  test "destroying a Search line" do
    visit search_lines_url
    page.accept_confirm do
      click_on "Destroy", match: :first
    end

    assert_text "Search line was successfully destroyed"
  end
end
