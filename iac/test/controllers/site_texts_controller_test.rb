require 'test_helper'

class SiteTextsControllerTest < ActionDispatch::IntegrationTest
  setup do
    @site_text = site_texts(:one)
  end

  test "should get index" do
    get site_texts_url
    assert_response :success
  end

  test "should get new" do
    get new_site_text_url
    assert_response :success
  end

  test "should create site_text" do
    assert_difference('SiteText.count') do
      post site_texts_url, params: { site_text: { description: @site_text.description, identification: @site_text.identification, title: @site_text.title } }
    end

    assert_redirected_to site_text_url(SiteText.last)
  end

  test "should show site_text" do
    get site_text_url(@site_text)
    assert_response :success
  end

  test "should get edit" do
    get edit_site_text_url(@site_text)
    assert_response :success
  end

  test "should update site_text" do
    patch site_text_url(@site_text), params: { site_text: { description: @site_text.description, identification: @site_text.identification, title: @site_text.title } }
    assert_redirected_to site_text_url(@site_text)
  end

  test "should destroy site_text" do
    assert_difference('SiteText.count', -1) do
      delete site_text_url(@site_text)
    end

    assert_redirected_to site_texts_url
  end
end
