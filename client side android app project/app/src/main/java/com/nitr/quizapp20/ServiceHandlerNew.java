package com.nitr.quizapp20;

import android.content.ContentValues;
import android.util.Log;
import android.widget.Toast;
import android.content.Context;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.io.UnsupportedEncodingException;
import java.net.URL;
import java.net.URLConnection;
import java.net.URLEncoder;
import java.util.List;

/**
 * Created by Ashutosh Dwivedi on 30-Jan-16.
 */
public class ServiceHandlerNew {
/*  
created by Ashutosh Dwivedi on 30-Jan-16
*/
static String response = null;
    public final static int GET = 1;
    public final static int POST = 2;

    public ServiceHandlerNew() {

    }

    /*
     * Making service call
     * @url - url to make request
     * @method - http request method
     * */
    public String makeServiceCall(String url, int method) {
        return this.makeServiceCall(url, method, null);
    }

    /*
     * Making service call
     * @url - url to make request
     * @method - http request method
     * @params - http request params
     * */
    public String makeServiceCall(String url, int method,
                                  ContentValues params) {

            int i=0;

            String data="";
        BufferedReader reader=null;

    try{
        for(String key:params.keySet())
        {
            data+= URLEncoder.encode(key, "UTF-8")
                    + "=" + URLEncoder.encode(params.getAsString(key), "UTF-8")+"&";
        }
        data = data.substring(0, data.length()-1);
        URL url1 = new URL(url+"?"+data);
       // Log.d("url",">"+url1.toString());
        // Send POST data request
        //Toast.makeText(getApplicationContext(),d)
        URLConnection conn = url1.openConnection();
        conn.setDoOutput(true);
        OutputStreamWriter wr = new OutputStreamWriter(conn.getOutputStream());
        wr.write( data );
        wr.flush();

        // Get the server response

        reader = new BufferedReader(new InputStreamReader(conn.getInputStream()));
        StringBuilder sb = new StringBuilder();
        String line = null;

        // Read Server Response
        while((line = reader.readLine()) != null)
        {
            // Append server response in string
            sb.append(line + "\n");
        }


        response = sb.toString();


    } catch (UnsupportedEncodingException e) {
        e.printStackTrace();
    }catch (IOException e){
        e.printStackTrace();
    }
    finally
    {
        try
        {

            reader.close();
        }
        catch(Exception e) {
            e.printStackTrace();
        }
    }
    return response;
    }
}
