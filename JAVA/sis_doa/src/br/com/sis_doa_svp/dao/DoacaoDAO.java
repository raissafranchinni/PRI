
 
package br.com.sis_doa_svp.dao;

import br.com.sis_doa_svp.dto.DoacaoDTO;
import br.com.sis_doa_svp.dto.DoadorDTO;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class DoacaoDAO {
    
    public DoacaoDAO (){
    }
    
        
         private final ResultSet rs = null;

    private Statement stmt = null;
        
    public boolean inserirDoacao(DoacaoDTO doacaoDTO, DoadorDTO doadorDTO) throws SQLException {
        String comando = "";
     try {
            
            ConexaoDAO.ConectDB();
           
            stmt = ConexaoDAO.con.createStatement();
         
            comando = "Insert into Doacao ( "
    
}
     return (false);
     }

    }