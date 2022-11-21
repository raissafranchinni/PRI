package br.com.sis_doa_svp.dao;
import java.sql.*;

public class ConexaoDAO {
   
    public static Connection con = null;
    public static void ConectDB() {
        
        try { 
            String dsn = "projeto_sis_doa_svp";
            String user = "postgres";
            String senha = "postdba";

            DriverManager.registerDriver(new org.postgresql.Driver());

            String url = "jdbc:postgresql://localhost:5432/" + dsn;

            con = DriverManager.getConnection(url, user, senha);

            con.setAutoCommit(false);
            if (con == null) {
                System.out.println("Erro ao abrir o banco.");
            }    
        } 
        catch (Exception e) {
            System.out.println("Problema ao abrir o banco de dados." + e.getMessage());
        } 
    }
    
    public static void CloseDB() {
        
        try {
            con.close();
        }
        catch (Exception e) {
            System.out.println("Problema ao fechar o banco de dados." + e.getMessage());
        }
    }
    
    public ConexaoDAO() {
    }
}