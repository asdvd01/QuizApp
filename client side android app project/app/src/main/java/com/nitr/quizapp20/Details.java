package com.nitr.quizapp20;

import android.content.ContentValues;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import com.rey.material.widget.Button;
import android.widget.EditText;
import android.widget.Toast;
//import org.apache.http.NameValuePair;
//import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class Details extends AppCompatActivity {
    EditText et_roll, et_name, et_quiz_id;
    Button btn_start_quiz;
    String str_roll, str_name, str_quiz_id;

     static JSONArray quesList = null;
    String status="";
    public static String ROLL = null;
    public static String QUIZID = null;
    public static int time=0;
    public static String msg=null;
    ProgressDialog pDialog;

    //String url = "http://nitrquiz.esy.es/input.php";
    String url =Settings.sa+"input.php";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_details);

        et_roll = (EditText) findViewById(R.id.et_roll);
        et_name = (EditText) findViewById(R.id.et_name);
        et_quiz_id = (EditText) findViewById(R.id.et_quiz_id);

        btn_start_quiz = (Button) findViewById(R.id.btn_start_quiz);

        btn_start_quiz.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                int flag = 0;
                if (!et_name.getText().toString().equals("") && et_roll.getText().toString().length() >= 3) {
                    str_name = et_name.getText().toString();
                    flag++;
                } else {
                    Toast.makeText(getApplicationContext(), "Enter Name Correctly", Toast.LENGTH_LONG).show();
                }
                if (!et_roll.getText().toString().equals("") && et_roll.getText().toString().length() >= 9) {
                    str_roll = et_roll.getText().toString().toUpperCase();
                    ROLL = str_roll;
                    flag++;
                } else {
                    Toast.makeText(getApplicationContext(), "Enter Roll Correctly", Toast.LENGTH_LONG).show();
                }

                if (!et_quiz_id.getText().toString().equals("") ) {
                    str_quiz_id = et_quiz_id.getText().toString();
                    QUIZID = str_quiz_id;
                    flag++;
                } else {
                    Toast.makeText(getApplicationContext(), "Enter Quiz id Correctly", Toast.LENGTH_LONG).show();
                }

                if (flag == 3) {
                    new PutData().execute();
                }

            }
        });
    }
        public static JSONArray loadQuestions()
    {
        return quesList;
    }


    private class PutData extends AsyncTask<Void, Void, Void> {

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            // Showing progress dialog
            pDialog = new ProgressDialog(Details.this);
            pDialog.setMessage("Please wait...");
            pDialog.setCancelable(false);
            pDialog.show();

        }

        @Override
        protected Void doInBackground(Void... arg0) {
            // Creating service handler class instance
            ServiceHandlerNew sh = new ServiceHandlerNew();
            //List<NameValuePair> alist = new ArrayList<NameValuePair>();
            ContentValues alist = new ContentValues();
            alist.put("roll", str_roll);
            alist.put("name", str_name);
            alist.put("quiz_id", str_quiz_id);
            //alist.add(new BasicNameValuePair("roll", str_roll));
           // alist.add(new BasicNameValuePair("name", str_name));
           // alist.add(new BasicNameValuePair("quiz_id", str_quiz_id));
            // Making a request to url and getting response
            String jsonStr = sh.makeServiceCall(url, ServiceHandlerNew.GET, alist);

            Log.d("Response: ", "> " + jsonStr);

            if (jsonStr != null) {
                try {
                    JSONObject jsonObj = new JSONObject(jsonStr);
                   // status= jsonObj.getString("status");
                    JSONArray a = jsonObj.getJSONArray("result");
                    quesList= a.getJSONArray(0);
                    time = a.getJSONObject(1).getInt("time");
                    status=a.getJSONObject(2).getString("status");
                    quesList=quesList.getJSONObject(0).getJSONArray("Questions");



                } catch (JSONException e) {
                    try {
                        JSONObject jsonObj = new JSONObject(jsonStr);
                        String result= jsonObj.getString("result");
                        msg=jsonObj.getJSONArray("result").getJSONObject(0).getString("status");
                        Log.e("status>",result);

                    }
                    catch (JSONException e2){
                        e2.printStackTrace();
                    }
                    Log.d("status: ", "> " + status);
                    Log.d("queslist: ", "> " + quesList);
                    Log.d("time: ", "> " + time);
                }
            } else {
                Log.e("ServiceHandler", "Couldn't get any data from the url");
                   msg="Check your connectivity to the server "+Settings.sa;
            }

            return null;
        }

        @Override
        protected void onPostExecute(Void result) {
            super.onPostExecute(result);
            // Dismiss the progress dialog
            if (pDialog.isShowing())
                pDialog.dismiss();
            if (status.equals("true")) {
                Toast.makeText(getApplicationContext(), "Welcome ...", Toast.LENGTH_LONG).show();

                Intent intent = new Intent(getApplicationContext(), quiz.class);
                Details.this.finish();
                startActivity(intent);
           } else {
                if(status.equals(""))
              Toast.makeText(getApplicationContext(), msg, Toast.LENGTH_LONG).show();
            }
        }
    }
}
