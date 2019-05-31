require 'test_helper'

class DisclosuresControllerTest < ActionDispatch::IntegrationTest
  setup do
    @disclosure = disclosures(:one)
  end

  test "should get index" do
    get disclosures_url
    assert_response :success
  end

  test "should get new" do
    get new_disclosure_url
    assert_response :success
  end

  test "should create disclosure" do
    assert_difference('Disclosure.count') do
      post disclosures_url, params: { disclosure: { active: @disclosure.active, author: @disclosure.author, description: @disclosure.description, textnew: @disclosure.textnew, title: @disclosure.title } }
    end

    assert_redirected_to disclosure_url(Disclosure.last)
  end

  test "should show disclosure" do
    get disclosure_url(@disclosure)
    assert_response :success
  end

  test "should get edit" do
    get edit_disclosure_url(@disclosure)
    assert_response :success
  end

  test "should update disclosure" do
    patch disclosure_url(@disclosure), params: { disclosure: { active: @disclosure.active, author: @disclosure.author, description: @disclosure.description, textnew: @disclosure.textnew, title: @disclosure.title } }
    assert_redirected_to disclosure_url(@disclosure)
  end

  test "should destroy disclosure" do
    assert_difference('Disclosure.count', -1) do
      delete disclosure_url(@disclosure)
    end

    assert_redirected_to disclosures_url
  end
end
