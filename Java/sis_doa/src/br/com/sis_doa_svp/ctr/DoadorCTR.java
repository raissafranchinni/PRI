
package br.com.sis_doa_svp.ctr;

import java.sql.ResultSet;
import br.com.sis_doa_svp.dao.ConexaoDAO;
import br.com.sis_doa_svp.dao.DoadorDAO;
import br.com.sis_doa_svp.dto.DoadorDTO;


public class DoadorCTR {
    DoadorDAO doadorDAO = new DoadorDAO();
    
    public DoadorCTR() {
       
    }
    
    public String inserirDoador(DoadorDTO DoadorDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (doadorDAO.inserirDoador(DoadorDTO)) {
                return "Doador Cadastrado com Sucesso!!!";
            } else {
                return "Doador NÃO Cadastrado!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.		
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Doador NÃO Cadastrado";
}
    }
    
      public String alterarDoador(DoadorDTO doaodrDTO) {
        try {
            DoadorDTO DoadorDTO = null;
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (!doadorDAO.alterarDoador(DoadorDTO)) {
                return "Doador NÃO Alterado!!!";
            } else {
                return "Doador Alterado com Sucesso!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Doaodor NÃO Alterado!!!";
        }
      }
      
      public String excluirCarro(DoadorDTO doadorDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (doadorDAO.excluirDoador(doadorDTO)) {
                return "Doador Excluído com Sucesso!!!";
            } else {
                return "Doador NÃO Excluído!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Doador NÃO Excluído!!!";
        }
      }
      
        public ResultSet consultarCarro(DoadorDTO doadorDTO, int opcao) {
        //É criado um atributo do tipo ResultSet, pois este método recebe o resultado de uma consulta.
        ResultSet rs = null;

        //O atributo rs recebe a consulta realizada pelo método da classe DAO
        rs = doadorDAO.consultarCarro(doadorDTO, opcao);

        return rs;
    }

    /**
     * Método utilizado para controlar o acesso ao método CloseDB da classe
     * ConexaoDAO
     */
    public void CloseDB() {
        ConexaoDAO.CloseDB();
    }
}

    



