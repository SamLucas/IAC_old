class AdminsBackoffice::SubjectsController < AdminsBackofficeController

  before_action :get_id_user, only: [:update, :edit, :destroy]

  def index
    @subjects = Subject.all.order(:description).page params[:page]
  end
  
  def edit   
  end

  def new
    @subject = Subject.new
  end 

  def create
    @subject = Subject.new(def_paramets)
    if @subject.save
      redirect_to admins_backoffice_subjects_path, notice: "Adicionando assunto/área no repositório."
    else
      render :new
    end
  end
  
  def update 
    if @subject.update(def_paramets)
      redirect_to admins_backoffice_subjects_path, notice: "Assunto/Área atualizado."
    else
      render :edit
    end
  end

  def destroy
    if @subject.destroy
      redirect_to admins_backoffice_subjects_path, notice: "Assunto/Área exculido."
    else
      render :index
    end
  end

  private 

  def get_id_user
    @subject = Subject.find(params[:id]) 
  end

  def def_paramets
    params_admin = params.require(:subject).permit(:description)
  end
end
