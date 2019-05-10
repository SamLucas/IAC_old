class SiteTextsController < ApplicationController
  before_action :set_site_text, only: [:show, :edit, :update, :destroy]

  # GET /site_texts
  # GET /site_texts.json
  def index
    @site_texts = SiteText.all
  end

  # GET /site_texts/1
  # GET /site_texts/1.json
  def show
  end

  # GET /site_texts/new
  def new
    @site_text = SiteText.new
  end

  # GET /site_texts/1/edit
  def edit
  end

  # POST /site_texts
  # POST /site_texts.json
  def create
    @site_text = SiteText.new(site_text_params)

    respond_to do |format|
      if @site_text.save
        format.html { redirect_to @site_text, notice: 'Site text was successfully created.' }
        format.json { render :show, status: :created, location: @site_text }
      else
        format.html { render :new }
        format.json { render json: @site_text.errors, status: :unprocessable_entity }
      end
    end
  end

  # PATCH/PUT /site_texts/1
  # PATCH/PUT /site_texts/1.json
  def update
    respond_to do |format|
      if @site_text.update(site_text_params)
        format.html { redirect_to @site_text, notice: 'Site text was successfully updated.' }
        format.json { render :show, status: :ok, location: @site_text }
      else
        format.html { render :edit }
        format.json { render json: @site_text.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /site_texts/1
  # DELETE /site_texts/1.json
  def destroy
    @site_text.destroy
    respond_to do |format|
      format.html { redirect_to site_texts_url, notice: 'Site text was successfully destroyed.' }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_site_text
      @site_text = SiteText.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def site_text_params
      params.require(:site_text).permit(:title, :description, :identification)
    end
end
