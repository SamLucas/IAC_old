require 'test_helper'

class SearchLinesControllerTest < ActionDispatch::IntegrationTest
  setup do
    @search_line = search_lines(:one)
  end

  test "should get index" do
    get search_lines_url
    assert_response :success
  end

  test "should get new" do
    get new_search_line_url
    assert_response :success
  end

  test "should create search_line" do
    assert_difference('SearchLine.count') do
      post search_lines_url, params: { search_line: { description: @search_line.description, teacher: @search_line.teacher, title: @search_line.title } }
    end

    assert_redirected_to search_line_url(SearchLine.last)
  end

  test "should show search_line" do
    get search_line_url(@search_line)
    assert_response :success
  end

  test "should get edit" do
    get edit_search_line_url(@search_line)
    assert_response :success
  end

  test "should update search_line" do
    patch search_line_url(@search_line), params: { search_line: { description: @search_line.description, teacher: @search_line.teacher, title: @search_line.title } }
    assert_redirected_to search_line_url(@search_line)
  end

  test "should destroy search_line" do
    assert_difference('SearchLine.count', -1) do
      delete search_line_url(@search_line)
    end

    assert_redirected_to search_lines_url
  end
end
