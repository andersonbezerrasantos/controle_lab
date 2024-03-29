<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  

/**
 * MY_Form_validation Class
 *
 * Extends Form_Validation library
 *
 */
class MY_Form_validation extends CI_Form_validation {

	function __construct()	{
	    parent::__construct();        
        /**
         * Prefixos do form validate erro
         */
        $this->_error_prefix = '<div class="alert bg-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;';
        $this->_error_suffix = '</div>';
	}

	/**
     *
     * decimar_br
	 *
	 * Verifica se é decimal, mas com virgula no lugar de .
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	public function decimal_br($str)
	{
		$CI =& get_instance();
        $CI->form_validation->set_message('decimal_br', 'O campo %s não contem um valor decimal válido.');

        return (bool) preg_match('/^[\-+]?[0-9]+\,[0-9]+$/', $str);
	}

    /**
     *
     * valid_cpf
     *
     * Verifica CPF é válido
     * @access	public
     * @param	string
     * @return	bool
     */
    function valid_cpf($cpf)
    {
        $CI =& get_instance();
        
        $CI->form_validation->set_message('valid_cpf', 'O %s informado não é válido.');

        $cpf = preg_replace('/[^0-9]/','',$cpf);

        if(strlen($cpf) != 11 || preg_match('/^([0-9])\1+$/', $cpf))
        {
            return FALSE;
        }

        // 9 primeiros digitos do cpf
        $digit = substr($cpf, 0, 9);

        // calculo dos 2 digitos verificadores
        for($j=10; $j <= 11; $j++)
        {
            $sum = 0;
            for($i=0; $i< $j-1; $i++)
            {
                $sum += ($j-$i) * ((int) $digit[$i]);
            }

            $summod11 = $sum % 11;
            $digit[$j-1] = $summod11 < 2 ? 0 : 11 - $summod11;
        }
        
        return $digit[9] == ((int)$cpf[9]) && $digit[10] == ((int)$cpf[10]);
    }

    /**
     * valid_date
     *
     * valida data no pradrao brasileiro
     * 
     * @access	public
     * @param	string
     * @return	bool
     */
    function valid_date($data)
    {
        $CI =& get_instance();
        $CI->form_validation->set_message('valid_date', 'O campo %s não contém uma data válida.');

        $padrao = explode('/', $data);

        return checkdate($padrao[1], $padrao[0], $padrao[2]);
    }

    /**
     * valid_cep
     *
     * Verifica se CEP é válido
     * 
     * @access	public
     * @param	string
     * @return	bool
     */
    function valid_cep($cep)
    {
        $CI =& get_instance();
        $CI->form_validation->set_message('valid_cep', 'O campo %s não contém um CEP válido.');

        $cep = str_replace('.', '', $cep);
        $cep = str_replace('-', '', $cep);

        $url = 'http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 0);

        $resultado = curl_exec($ch);
        curl_close($ch);

        if( ! $resultado)
            $resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";

        $resultado = urldecode($resultado);
        $resultado = utf8_encode($resultado);
        parse_str( $resultado, $retorno);

        if($retorno['resultado'] == 1 || $retorno['resultado'] == 2)
            return TRUE;
        else
            return FALSE;
    }

    /**
     * valid_phone
     *
     * validação simples de telefone
     *
     * @access	public
     * @param	string
     * @return	bool
     */
    function valid_phone($fone)
    {
        $CI =& get_instance();
        $CI->form_validation->set_message('valid_fone', 'O campo %s não contém um Telefone válido.');

        $fone = preg_replace('/[^0-9]/','',$fone);
        $fone = (string) $fone;

        if( strlen($fone) >= 10)
            return TRUE;
        else
            return FALSE;
    }
}