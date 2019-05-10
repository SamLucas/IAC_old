class SearchLinesController < ApplicationController
  before_action :set_search_line, only: [:show, :edit, :update, :destroy]
  layout 'admins'

  # GET /search_lines
  # GET /search_lines.json
  def index
    @search_lines = SearchLine.all.page(params[:page])
  end

  # GET /search_lines/1
  # GET /search_lines/1.json
  def show
  end

  # GET /search_lines/new
  def new
    @search_line = SearchLine.new
  end

  # GET /search_lines/1/edit
  def edit
  end

  # POST /search_lines
  # POST /search_lines.json
  def create
    @search_line = SearchLine.new(search_line_params)

    respond_to do |format|
      if @search_line.save
        format.html { redirect_to @search_line, notice: 'Search line was successfully created.' }
        format.json { render :show, status: :created, location: @search_line }
      else
        format.html { render :new }
        format.json { render json: @search_line.errors, status: :unprocessable_entity }
      end
    end
  end

  # PATCH/PUT /search_lines/1
  # PATCH/PUT /search_lines/1.json
  def update
    respond_to do |format|
      if @search_line.update(search_line_params)
        format.html { redirect_to @search_line, notice: 'Search line was successfully updated.' }
        format.json { render :show, status: :ok, location: @search_line }
      else
        format.html { render :edit }
        format.json { render json: @search_line.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /search_lines/1
  # DELETE /search_lines/1.json
  def destroy
    @search_line.destroy
    respond_to do |format|
      format.html { redirect_to search_lines_url, notice: 'Search line was successfully destroyed.' }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_search_line
      @search_line = SearchLine.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def search_line_params
      params.require(:search_line).permit(:title, :teacher, :description)
    end
end
