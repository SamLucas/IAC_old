class DisclosuresController < ApplicationController
  before_action :set_disclosure, only: [:show, :edit, :update, :destroy]
  layout 'admins'
  
  # GET /disclosures
  # GET /disclosures.json
  def index
    @disclosures = Disclosure.all.order(:description).page(params[:page])
  end

  # GET /disclosures/1
  # GET /disclosures/1.json
  def show
  end

  # GET /disclosures/new
  def new
    @disclosure = Disclosure.new
  end

  # GET /disclosures/1/edit
  def edit
  end

  # POST /disclosures
  # POST /disclosures.json
  def create
    @disclosure = Disclosure.new(disclosure_params)

    respond_to do |format|
      if @disclosure.save
        format.html { redirect_to @disclosure, notice: 'Disclosure was successfully created.' }
        format.json { render :show, status: :created, location: @disclosure }
      else
        format.html { render :new }
        format.json { render json: @disclosure.errors, status: :unprocessable_entity }
      end
    end
  end

  # PATCH/PUT /disclosures/1
  # PATCH/PUT /disclosures/1.json
  def update
    respond_to do |format|
      if @disclosure.update(disclosure_params)
        format.html { redirect_to @disclosure, notice: 'Disclosure was successfully updated.' }
        format.json { render :show, status: :ok, location: @disclosure }
      else
        format.html { render :edit }
        format.json { render json: @disclosure.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /disclosures/1
  # DELETE /disclosures/1.json
  def destroy
    @disclosure.destroy
    respond_to do |format|
      format.html { redirect_to disclosures_url, notice: 'Disclosure was successfully destroyed.' }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_disclosure
      @disclosure = Disclosure.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def disclosure_params
      params.require(:disclosure).permit(:title, :active, :description, :author, :textnew)
    end
end
