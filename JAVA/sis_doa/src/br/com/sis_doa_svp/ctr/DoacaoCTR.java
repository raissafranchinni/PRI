
package br.com.sis_doa_svp.ctr;

import java.sql.*;
import br.com.sis_doa_svp.dao.ConexaoDAO;
import br.com.sis_doa_svp.dao.DoacaoDAO;
import br.com.sis_doa_svp.dto.DoacaoDTO;
import br.com.sis_doa_svp.dto.DoadorDTO;

public class DoacaoCTR {
    
    DoacaoDAO doacaoDAO = new DoacaoDAO();
    
    public DoacaoCTR(){
    }
    
      public String inserirDoacao(DoacaoDTO doacaoDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (doacaoDAO.inserirDoacao(doacaoDTO)) {
                return "Doação Cadastrada com Sucesso!!!";
            } else {
                return "Doação NÃO Cadastrada!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Doação NÃO Cadastrada!!!";
        }
    }
      
       public String alterarDoacao(DoacaoDTO doacaoDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (doacaoDAO.alterarDoacao(doacaoDTO)) {
                return "Doação Alterado com Sucesso!!!";
            } else {
                return "Doação NÃO Alterado!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Doação NÃO Alterado!!!";
        }
    }
       
        public ResultSet consultarDoacao(DoacaoDTO doacaoDTO, DoadorDTO doadorDTO, int opcao) {
        //É criado um atributo do tipo ResultSet, pois este método recebe o resultado de uma consulta.
        ResultSet rs = null;

        //O atributo rs recebe a consulta realizada pelo método da classe DAO
        rs = doacaoDAO.consultarDoacao(doacaoDTO, opcao);

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
