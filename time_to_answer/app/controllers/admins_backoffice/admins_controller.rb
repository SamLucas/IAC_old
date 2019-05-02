class AdminsBackoffice::AdminsController < AdminsBackofficeController

  before_action :alter_email, only: [:update]
  before_action :get_id_user, only: [:update, :edit, :destroy]

  def index
    @admins = Admin.all.page params[:page]
  end
  
  def edit   
  end

  def new
    @admin = Admin.new
  end 

  def create
    @admin = Admin.new(def_paramets)
    if @admin.save
      redirect_to admins_backoffice_admins_path, notice: "Criando Adiministrador."
    else
      render :new
    end
  end
  
  def update 
    if @admin.update(def_paramets)
      redirect_to admins_backoffice_admins_path, notice: "Adiministrador atualizado."
    else
      render :edit
    end
  end

  def destroy
    if @admin.destroy
      redirect_to admins_backoffice_admins_path, notice: "Adiministrador exculido."
    else
      render :index
    end
  end

  private 

  def get_id_user
    @admin = Admin.find(params[:id]) 
  end

  def def_paramets
    params_admin = params.require(:admin).permit(:email, :password, :password_confirmation)
  end
  
  def alter_email
    if params[:admin][:password].blank? && params[:admin][:password_confirmation].blank?
      params[:admin].extract!(:password, :password_confirmation)
    end
  end

end