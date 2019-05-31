class AdminsBackoffice::QuestionsController < AdminsBackofficeController

  before_action :get_id_user, only: [:update, :edit, :destroy]
  before_action :get_subjects, only: [:new, :create]

  def index
    @questions = Question.includes(:subject)
                         .order(:description)
                         .page params[:page]
  end
  
  def edit   
  end

  def new
    @question = Question.new
  end 

  def create
    @question = Question.new(def_paramets)
    if @question.save
      redirect_to admins_backoffice_questions_path, notice: "Pergunta adicionada no repositório."
    else
      render :new
    end
  end
  
  def update 
    if @question.update(def_paramets)
      redirect_to admins_backoffice_questions_path, notice: "Pergunta atualizada."
    else
      render :edit
    end
  end

  def destroy
    if @question.destroy
      redirect_to admins_backoffice_questions_path, notice: "Pergunta exculida."
    else
      render :index
    end
  end

  private 

  def get_id_user
    @question = Question.find(params[:id]) 
  end

  def get_subjects
    @subjects = Subject.all
  end

  def def_paramets
    params_admin = params.require(:question).permit(:description, :subject_id)
  end
end
