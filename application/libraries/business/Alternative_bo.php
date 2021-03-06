<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author djalmocruzjr (djalmo.cruz@gmail.com)
 * @version 1.0
 * @since 23/10/2016
 *
 * Classe para aplicar as regras de negocio inerentes as operacoes do controller <i>Alternative</i>.
 */
class Alternative_bo {

    protected $CI;

    /**
     * @var array
     *
     * Recebe os dados a serem validados.
     */
    private $data;

    /**
     * @var array
     *
     * Armazena os erros inerentes ao processo de validacao.
     */
    private $errors;

    /**
     * Account_bo constructor.
     */
    public function __construct() {
        // Loading variables
        $this->data = [];
        $this->errors = [];
        $this->CI = &get_instance();

        // Loading model
        $this->CI->load->model('questao_model');
        $this->CI->load->model('usuario_model');
        $this->CI->load->model('grupo_model');
    }

    /**
     * @param array $data
     *
     * Metodo para setar os dados a serem validados.
     */
    public function set_data($data) {
        $this->data = $data;
    }

    /**
     * @param array $data
     *
     * Metodo para retornar os dados apos serem validados.
     */
    public function get_data() {
        return $this->data;
    }

    /**
     * @return array
     *
     * Metodo para retornar os erros inerentes ao processo de validacao.
     */
    public function get_errors() {
        return $this->errors;
    }

    /**
     * @return bool
     *
     * Metodo para validar os dados inentes ao processo de <i>add</i> do controller <i>Alternative</i>.
     */
    public function validate_add() {
        $status = TRUE;

        // Verifica se o decode do JSON foi feito corretamente
        if (is_null($this->data)) {
            $this->errors['json_decode'] = "Não foi possível realizar o decode dos dados. JSON inválido!";
            return false;
        }

        // Validando o campo <i>usnid</i> (ID do usuario)
        if (!isset($this->data['usnid']) || empty(trim($this->data['usnid']))) {
            $this->errors['usnid'] = 'O ID DO USUÁRIO é obrigatório!';
            $status = FALSE;
        } else if (!is_numeric($this->data['usnid'])) {
            $this->errors['usnid'] = 'O ID DO USUÁRIO deve ser um valor inteiro!';
            $status = FALSE;
        } else if (is_null($this->CI->usuario_model->find_by_usnid($this->data['usnid']))) {
            $this->errors['usnid'] = 'ID DO USUÁRIO inválido!';
            $status = FALSE;
        }

        // Validando o campo <i>grnid</i> (ID do grupo)
        if (!isset($this->data['grnid']) || empty(trim($this->data['grnid']))) {
            $this->errors['grnid'] = 'O ID DO GRUPO é obrigatório!';
            $status = FALSE;
        } else if (!is_numeric($this->data['grnid'])) {
            $this->errors['grnid'] = 'O ID DO GRUPO deve ser um valor inteiro!';
            $status = FALSE;
        } else if (is_null($this->CI->grupo_model->find_by_grnid($this->data['grnid']))) {
            $this->errors['grnid'] = 'ID DO GRUPO inválido!';
            $status = FALSE;
        }

        // Validando o campo <i>alnidqe</i> (ID da questao)
        if (!isset($this->data['alnidqe']) || empty(trim($this->data['alnidqe']))) {
            $this->errors['alnidqe'] = 'O ID DA QUESTÃO é obrigatória!';
            $status = FALSE;
        } else if (!is_numeric($this->data['alnidqe'])) {
            $this->errors['alnidqe'] = 'O ID DA QUESTÃO deve ser um valor inteiro!';
            $status = FALSE;
        } else if (is_null($this->CI->questao_model->find_by_qenid($this->data['alnidqe']))) {
            $this->errors['alnidqe'] = 'ID DA QUESTÃO inválido!';
            $status = FALSE;
        }

        // Validando o campo <i>alctext</i> (Texto da alternativa)
        if (!isset($this->data['alctext']) || empty(trim($this->data['alctext']))) {
            $this->errors['alctext'] = 'O TEXTO DA ALTERNATIVA é obrigatório!';
            $status = FALSE;
        } else if (!is_string($this->data['alctext'])) {
            $this->errors['alctext'] = 'O TEXTO DA ALTERNATIVA deve ser um valor alfanumérico!';
            $status = FALSE;
        }

        // Validando o campo <i>allcert</i> (Define se alternativa eh verdadeira ou falsaa)
        if (!isset($this->data['allcert'])) {
            $this->errors['allcert'] = 'É obrigatório informar se a alternativa é verdadeira ou falsa!';
            $status = FALSE;
        } else if (!is_bool($this->data['allcert'])) {
            $this->errors['allcert'] = 'Este campo dever conter um valor lógico (Verdadeiro ou False).';
            $status = FALSE;
        }

        return $status;
    }

    /**
     * @return bool
     *
     * Metodo para validar os dados inentes ao processo de <i>edit</i> do controller <i>Alternative</i>.
     */
    public function validate_edit() {
        $status = TRUE;

        // Verifica se o decode do JSON foi feito corretamente
        if (is_null($this->data)) {
            $this->errors['json_decode'] = "Não foi possível realizar o decode dos dados. JSON inválido!";
            return false;
        }

        // Validando o campo <i>usnid</i> (ID do usuario)
        if (!isset($this->data['usnid']) || empty(trim($this->data['usnid']))) {
            $this->errors['usnid'] = 'O ID DO USUÁRIO é obrigatório!';
            $status = FALSE;
        } else if (!is_numeric($this->data['usnid'])) {
            $this->errors['usnid'] = 'O ID DO USUÁRIO deve ser um valor inteiro!';
            $status = FALSE;
        } else if (is_null($this->CI->usuario_model->find_by_usnid($this->data['usnid']))) {
            $this->errors['usnid'] = 'ID DO USUÁRIO inválido!';
            $status = FALSE;
        }

        // Validando o campo <i>grnid</i> (ID do grupo)
        if (!isset($this->data['grnid']) || empty(trim($this->data['grnid']))) {
            $this->errors['grnid'] = 'O ID DO GRUPO é obrigatório!';
            $status = FALSE;
        } else if (!is_numeric($this->data['grnid'])) {
            $this->errors['grnid'] = 'O ID DO GRUPO deve ser um valor inteiro!';
            $status = FALSE;
        } else if (is_null($this->CI->grupo_model->find_by_grnid($this->data['grnid']))) {
            $this->errors['grnid'] = 'ID DO GRUPO inválido!';
            $status = FALSE;
        }

        // Validando o campo <i>alnid</i> (ID da alternativa)
        if (!isset($this->data['alnid']) || empty(trim($this->data['alnid']))) {
            $this->errors['alnid'] = 'O ID DA ALTERNATIVA é obrigatório!';
            $status = FALSE;
        } else if (!is_numeric($this->data['alnid'])) {
            $this->errors['alnid'] = 'O ID DA ALTERNATIVA deve ser um valor inteiro!';
            $status = FALSE;
        } else if (is_null($this->CI->alternativa_model->find_by_alnid($this->data['alnid']))) {
            $this->errors['alnid'] = 'ID DA ALTERNATIVA inválido!';
            $status = FALSE;
        }

        // Validando o campo <i>alnidqe</i> (ID da questao)
        if (!isset($this->data['alnidqe']) || empty(trim($this->data['alnidqe']))) {
            $this->errors['alnidqe'] = 'O ID DA QUESTÃO é obrigatória!';
            $status = FALSE;
        } else if (!is_numeric($this->data['alnidqe'])) {
            $this->errors['alnidqe'] = 'O ID DA QUESTÃO deve ser um valor inteiro!';
            $status = FALSE;
        } else if (is_null($this->CI->questao_model->find_by_qenid($this->data['alnidqe']))) {
            $this->errors['alnidqe'] = 'ID DA QUESTÃO inválido!';
            $status = FALSE;
        }

        // Validando o campo <i>alctext</i> (Texto da alternativa)
        if (!isset($this->data['alctext']) || empty(trim($this->data['alctext']))) {
            $this->errors['alctext'] = 'O TEXTO DA ALTERNATIVA é obrigatório!';
            $status = FALSE;
        } else if (!is_string($this->data['alctext'])) {
            $this->errors['alctext'] = 'O TEXTO DA ALTERNATIVA deve ser um valor alfanumérico!';
            $status = FALSE;
        }

        // Validando o campo <i>allcert</i> (Define se alternativa eh verdadeira ou falsaa)
        if (!isset($this->data['allcert'])) {
            $this->errors['allcert'] = 'É obrigatório informar se a alternativa é verdadeira ou falsa!';
            $status = FALSE;
        } else if (!is_bool($this->data['allcert'])) {
            $this->errors['allcert'] = 'Este campo dever conter um valor lógico (Verdadeiro ou False).';
            $status = FALSE;
        }

        return $status;
    }

    /**
     * @return bool
     *
     * Metodo para validar os dados inentes ao processo de <i>delete</i> do controller <i>Alternative</i>.
     */
    public function validate_delete() {
        $status = TRUE;

        // Verifica se o decode do JSON foi feito corretamente
        if (is_null($this->data)) {
            $this->errors['json_decode'] = "Não foi possível realizar o decode dos dados. JSON inválido!";
            return false;
        }

        // Validando o campo <i>usnid</i> (ID do usuario)
        if (!isset($this->data['usnid']) || empty(trim($this->data['usnid']))) {
            $this->errors['usnid'] = 'O ID DO USUÁRIO é obrigatório!';
            $status = FALSE;
        } else if (!is_numeric($this->data['usnid'])) {
            $this->errors['usnid'] = 'O ID DO USUÁRIO deve ser um valor inteiro!';
            $status = FALSE;
        } else if (is_null($this->CI->usuario_model->find_by_usnid($this->data['usnid']))) {
            $this->errors['usnid'] = 'ID DO USUÁRIO inválido!';
            $status = FALSE;
        }

        // Validando o campo <i>grnid</i> (ID do grupo)
        if (!isset($this->data['grnid']) || empty(trim($this->data['grnid']))) {
            $this->errors['grnid'] = 'O ID DO GRUPO é obrigatório!';
            $status = FALSE;
        } else if (!is_numeric($this->data['grnid'])) {
            $this->errors['grnid'] = 'O ID DO GRUPO deve ser um valor inteiro!';
            $status = FALSE;
        } else if (is_null($this->CI->grupo_model->find_by_grnid($this->data['grnid']))) {
            $this->errors['grnid'] = 'ID DO GRUPO inválido!';
            $status = FALSE;
        }

        // Validando o campo <i>alnid</i> (ID da alternativa)
        if (!isset($this->data['alnid']) || empty(trim($this->data['alnid']))) {
            $this->errors['alnid'] = 'O ID DA ALTERNATIVA é obrigatório!';
            $status = FALSE;
        } else if (!is_numeric($this->data['alnid'])) {
            $this->errors['alnid'] = 'O ID DA ALTERNATIVA deve ser um valor inteiro!';
            $status = FALSE;
        } else if (is_null($this->CI->alternativa_model->find_by_alnid($this->data['alnid']))) {
            $this->errors['alnid'] = 'ID DA ALTERNATIVA inválido!';
            $status = FALSE;
        }

        return $status;
    }

}