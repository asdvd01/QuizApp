package com.nitr.quizapp20;

import android.content.Context;
import android.content.Intent;
import android.preference.PreferenceManager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.content.SharedPreferences;
import android.widget.Toast;
import android.widget.EditText;
import com.rey.material.widget.Button;
public class Settings extends AppCompatActivity {
    public static SharedPreferences prefs;
    public static String sa="http://quiz.nitrkl.ac.in/";
    public EditText et;
    public Button bt;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_settings);
        prefs = getApplicationContext().getSharedPreferences("serverAddress", Context.MODE_PRIVATE);
        et= ((EditText)findViewById(R.id.etServerAddress));
        bt=(Button)findViewById(R.id.view);
        bt.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //first save the settings
                sa= et.getText().toString();
                SharedPreferences.Editor editor=prefs.edit();
                editor.putString("ip",sa);
                editor.apply();
                Toast.makeText(getApplicationContext(), "Saved! "+sa, Toast.LENGTH_LONG).show();
                finish();
            }
        });
        if(!prefs.getString("ip","null").equals("null"))
            sa= prefs.getString("ip", "null");
         et.setText(sa);
        Toast.makeText(getApplicationContext(), sa, Toast.LENGTH_LONG).show();
    }
   /* public void savesettings(View v)
    {

    }*/

}
