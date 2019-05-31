require 'test_helper'

class Site::WecomeControllerTest < ActionDispatch::IntegrationTest
  test "should get index" do
    get site_wecome_index_url
    assert_response :success
  end

end
