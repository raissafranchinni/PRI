
package br.com.sis_doa_svp.dao;

import br.com.sis_doa_svp.dto.DoadorDTO;
import java.sql.*;

public class DoadorDAO {
    
    public DoadorDAO(){
        
    }
    private ResultSet rs = null;
    
    private Statement stmt = null;
    
    public boolean inserirDoador(DoadorDTO doadorDTO){
        try{
            ConexaoDAO.ConectDB();
            
            stmt = ConexaoDAO.con.createStatement();
            
             String comando = "Insert into doador (cpf, telefone, numero,dataCadastro, nome, rua, bairro)"
                    +  " values ( "
                    + doadorDTO.getTelefone() + ", "
                    + doadorDTO.getCpf() + ", "
                    + doadorDTO.getNumeroC() + ", "
                     + "'" +doadorDTO.getNome() + "', "
                     + "'" +doadorDTO.getRua() + "', "
                     + "'" +doadorDTO.getBairro() + "', "
                     + "'" +doadorDTO.getDataCadastro() + "')";

            stmt.execute(comando.toUpperCase());

            ConexaoDAO.con.commit();
      
            stmt.close();
            return true;
        } 
        catch (Exception e) {
            System.out.println(e.getMessage());
            return false;
        } 
        finally {
       
            ConexaoDAO.CloseDB();
        }
    }
            
        

public boolean excluirDoador(DoadorDTO doadorDTO) {
        try {

            ConexaoDAO.ConectDB();

            stmt = ConexaoDAO.con.createStatement();

            String comando = "Delete from Doador where CodDoador  = " + doadorDTO.getCodDoador ();


            stmt.execute(comando);

            ConexaoDAO.con.commit();
            stmt.close();
            return true;
        } 
        catch (Exception e) {
            System.out.println(e.getMessage());
            return false;
        } 
        finally {
            ConexaoDAO.CloseDB();
        }
    }

        public boolean alterarDoador(DoadorDTO doadorDTO) {
        try {
           
            ConexaoDAO.ConectDB();
      
            stmt = ConexaoDAO.con.createStatement();
           
            String comando = "Update Doador set "
                    + "telefone = " + doadorDTO.getTelefone() + ", "
                    + "cpf = "+ doadorDTO.getCpf() + ", "
                    + "numeroC"+ doadorDTO.getNumeroC() + ", "
                     + "'" +doadorDTO.getNome() + "', "
                     + "'" +doadorDTO.getRua() + "', "
                     + "'" +doadorDTO.getBairro() + "', "
                     + "'" +doadorDTO.getDataCadastro() + "' "
                     +"where CodDoador  = " + doadorDTO.getCodDoador ();

          
                 stmt.execute(comando.toUpperCase());
    
            ConexaoDAO.con.commit();
           
            stmt.close();
            return true;
        }

            catch (Exception e) {
            System.out.println(e.getMessage());
            return false;
        } 

        finally {
          
            ConexaoDAO.CloseDB();
        }
    }

    public ResultSet consultarCarro(DoadorDTO doadorDTO, int opcao) {
        try {
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();

            String comando = "";
                switch (opcao){
                    case 1:
                        comando = "Select c.* "+
                                  "from Doador c "+
                                  "where nome ilike '" + doadorDTO.getNome() + "%' " +
                                  "order by c.nome";

                        break;
                    case 2:
                       comando = "Select c.* "+
                                 "from Doaodor c " +
                                 "where c.doadorCOD = " + doadorDTO.getCodDoador();

                        break;
                    case 3:
                        comando = "Select c.doadorCOD, c.cpf "+
                                  "from Doador c ";
                        break;

                }

            rs = stmt.executeQuery(comando.toUpperCase());
            return rs;

        } 
        catch (Exception e) {
            System.out.println(e.getMessage());
            return rs;
        }
    }   
}



    
