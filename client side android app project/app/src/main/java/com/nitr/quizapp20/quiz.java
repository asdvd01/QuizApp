package com.nitr.quizapp20;

import android.content.ContentValues;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

//import org.apache.http.NameValuePair;
//import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.app.AlertDialog.Builder;

import android.content.res.Resources;
import android.graphics.Color;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.RadioGroup.OnCheckedChangeListener;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TableLayout;

import android.util.Log;
import android.view.View.OnClickListener;
import android.view.Window;

import android.view.View;
import android.util.Log;
import android.widget.Toast;
import android.os.CountDownTimer;
public class quiz extends AppCompatActivity {
    /** Called when the activity is first created. */
    CountDownTimer cd;
    EditText question = null;
    EditText timer = null;
    RadioButton answer1 = null;
    RadioButton answer2 = null;
    RadioButton answer3 = null;
    RadioButton answer4 = null;
    RadioGroup answers = null;
    Button finish = null;
    int selectedAnswer = -1;
    int quesIndex = 0;
    int numEvents = 0;
    public static int score;
    int selected[] = null;
    int correctAns[] = null;
    long hours=0,minutes=0,seconds=0;
    int time=Details.time;
    boolean review =false;
    Button prev, next = null;
    //String scorel;
    ProgressDialog pDialog;
    String url = Settings.sa+"result.php";
    String status = "";

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_quiz);
        getWindow().addFlags(WindowManager.LayoutParams.FLAG_KEEP_SCREEN_ON);
        TableLayout quizLayout = (TableLayout) findViewById(R.id.quizLayout);
        quizLayout.setVisibility(View.INVISIBLE);

        try {
            question = (EditText) findViewById(R.id.question);
            answer1 = (RadioButton) findViewById(R.id.a0);
            answer2 = (RadioButton) findViewById(R.id.a1);
            answer3 = (RadioButton) findViewById(R.id.a2);
            answer4 = (RadioButton) findViewById(R.id.a3);
            answers = (RadioGroup) findViewById(R.id.answers);
            timer =(EditText)findViewById(R.id.timer);
           // RadioGroup questionLayout = (RadioGroup)findViewById(R.id.answers);
            Button finish = (Button)findViewById(R.id.finish);
            finish.setOnClickListener(finishListener);

            prev = (Button)findViewById(R.id.Prev);
            prev.setOnClickListener(prevListener);
            next = (Button)findViewById(R.id.Next);
            next.setOnClickListener(nextListener);


            selected = new int[Details.loadQuestions().length()];
            Arrays.fill(selected, -1);
            correctAns = new int[Details.loadQuestions().length()];
            Arrays.fill(correctAns, -1);


            this.showQuestion(0);
            if(time!=0) {
                cd = new CountDownTimer(time * 60 * 1000, 1000) {

                    public void onTick(long millisUntilFinished) {
                        long tss= millisUntilFinished/1000;
                        hours = tss / 3600;
                        minutes = (tss % 3600) / 60;
                        seconds = tss % 60;

                        String timeString = String.format("%02d:%02d:%02d", hours, minutes, seconds);
                        timer.setText("time remaining: " + timeString );
                    }

                    public void onFinish() {
                        timer.setText("Time UP!");
                        cd.cancel();
                        scoreCalculate();
                        review=false;
                       // new PutData().execute();
                        finish();
                    }
                };
                cd.start();
            }
            quizLayout.setVisibility(View.VISIBLE);

        } catch (Exception e) {
            Log.e("", e.getMessage(), e.getCause());
        }

    }

    private void showQuestion(int qIndex) {
        try {
            JSONObject aQues = Details.loadQuestions().getJSONObject(qIndex);
            String quesValue = aQues.getString("Question");
            if (correctAns[qIndex] == -1) {
                String correctAnsStr = aQues.getString("CorrectAnswer");
                correctAns[qIndex] = Integer.parseInt(correctAnsStr);
            }

            question.setText(quesValue.toCharArray(), 0, quesValue.length());
            answers.check(-1);
            answer1.setTextColor(Color.BLACK);
            answer2.setTextColor(Color.BLACK);
            answer3.setTextColor(Color.BLACK);
            answer4.setTextColor(Color.BLACK);
            JSONArray ansList = aQues.getJSONArray("Answers");
            String aAns = ansList.getJSONObject(0).getString("Answer");
            answer1.setText(aAns.toCharArray(), 0, aAns.length());
            aAns = ansList.getJSONObject(1).getString("Answer");
            answer2.setText(aAns.toCharArray(), 0, aAns.length());
            aAns = ansList.getJSONObject(2).getString("Answer");
            answer3.setText(aAns.toCharArray(), 0, aAns.length());
            aAns = ansList.getJSONObject(3).getString("Answer");
            answer4.setText(aAns.toCharArray(), 0, aAns.length());
            Log.d("",selected[qIndex]+"");
            if (selected[qIndex] == 0)
                answers.check(R.id.a0);
            if (selected[qIndex] == 1)
                answers.check(R.id.a1);
            if (selected[qIndex] == 2)
                answers.check(R.id.a2);
            if (selected[qIndex] == 3)
                answers.check(R.id.a3);

            setScoreTitle();
            if (quesIndex == (Details.loadQuestions().length()-1))
                next.setEnabled(false);

            if (quesIndex == 0)
                prev.setEnabled(false);

            if (quesIndex > 0)
                prev.setEnabled(true);

            if (quesIndex < (Details.loadQuestions().length()-1))
                next.setEnabled(true);


            if (review) {
                Log.d("review",selected[qIndex]+""+correctAns[qIndex]);
                if (selected[qIndex] != correctAns[qIndex]) {
                    if (selected[qIndex] == 0)
                        answer1.setTextColor(Color.RED);
                    if (selected[qIndex] == 1)
                        answer2.setTextColor(Color.RED);
                    if (selected[qIndex] == 2)
                        answer3.setTextColor(Color.RED);
                    if (selected[qIndex] == 3)
                        answer4.setTextColor(Color.RED);
                }
                if (correctAns[qIndex] == 0)
                    answer1.setTextColor(Color.GREEN);
                if (correctAns[qIndex] == 1)
                    answer2.setTextColor(Color.GREEN);
                if (correctAns[qIndex] == 2)
                    answer3.setTextColor(Color.GREEN);
                if (correctAns[qIndex] == 3)
                    answer4.setTextColor(Color.GREEN);
            }
        } catch (Exception e) {
            Log.e(this.getClass().toString(), e.getMessage(), e.getCause());
        }
    }

    @Override
    protected void onPause() {
        super.onPause();
        scoreCalculate();
        review=false;
        new PutData().execute();
    }

    private void scoreCalculate()
    {
        setAnswer();
        //Calculate Score
        score = 0;
        for(int i=0; i<correctAns.length; i++){
            if ((correctAns[i] != -1) && (correctAns[i] == selected[i]))
                score++;
            //score1= ""+score;
        }
    }
    private OnClickListener finishListener = new OnClickListener() {
        public void onClick(View v) {
           scoreCalculate();
         /*   AlertDialog alertDialog;
            alertDialog = new Builder(quiz.this).create();
            alertDialog.setTitle("Score");
            alertDialog.setMessage((score) +" out of " + (Details.loadQuestions().length()));

            alertDialog.setButton(AlertDialog.BUTTON_NEUTRAL, "Retake", new DialogInterface.OnClickListener(){

                public void onClick(DialogInterface dialog, int which) {
                    review = false;
                    quesIndex=0;
                    quiz.this.showQuestion(0);
                }
            });

            alertDialog.setButton(AlertDialog.BUTTON_POSITIVE, "Review", new DialogInterface.OnClickListener(){

                public void onClick(DialogInterface dialog, int which) {
                    review = true;
                    quesIndex=0;
                    quiz.this.showQuestion(0);
                }
            });

            alertDialog.setButton(AlertDialog.BUTTON_NEGATIVE,"Quit", new DialogInterface.OnClickListener(){

                public void onClick(DialogInterface dialog, int which) {
                    review = false;

                    new PutData().execute();

                    //finish();
                }
            });

            alertDialog.show();*/
            AlertDialog alertDialog;
            alertDialog = new Builder(quiz.this).create();
            alertDialog.setTitle("Submit ?");
            alertDialog.setMessage("Are you Sure you want to Submit?(Y/N)");

            alertDialog.setButton(AlertDialog.BUTTON_NEUTRAL, "No", new DialogInterface.OnClickListener(){

                public void onClick(DialogInterface dialog, int which) {
                    review = false;
                    quesIndex=0;
                    quiz.this.showQuestion(0);
                }
            });

        /*    alertDialog.setButton(AlertDialog.BUTTON_POSITIVE, "Review", new DialogInterface.OnClickListener(){

                public void onClick(DialogInterface dialog, int which) {
                    review = true;
                    quesIndex=0;
                    quiz.this.showQuestion(0);
                }
            });
            */
            alertDialog.setButton(AlertDialog.BUTTON_NEGATIVE,"Yes", new DialogInterface.OnClickListener(){

                public void onClick(DialogInterface dialog, int which) {
                    review = false;
                    finish();
                   // new PutData().execute();

                    //finish();
                }
            });

            alertDialog.show();
        }
    };

    private class PutData extends AsyncTask<Void, Void, Void> {

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            // Showing progress dialog
          //  pDialog = new ProgressDialog(quiz.this);
          //  pDialog.setMessage("Please wait...");
          //  pDialog.setCancelable(false);
           // pDialog.show();

        }

        @Override
        protected Void doInBackground(Void... arg0) {
            // Creating service handler class instance
            ServiceHandlerNew sh = new ServiceHandlerNew();
            ContentValues alist=new ContentValues();
            //List<NameValuePair> alist = new ArrayList<NameValuePair>();

            alist.put("roll", Details.ROLL);
            alist.put("marks_obtained", ""+(score));
            alist.put("quiz_id", ""+Details.QUIZID);
            //alist.add(new BasicNameValuePair("subject_code", str_subject_code));
            // Making a request to url and getting response
            String jsonStr = sh.makeServiceCall(url, ServiceHandlerNew.GET, alist);

            Log.d("Response: ", "> " + jsonStr);

            if (jsonStr != null) {
                try {
                    JSONObject jsonObj = new JSONObject(jsonStr);

                    status = jsonObj.getString("re");

                } catch (JSONException e) {
                    e.printStackTrace();
                }
            } else {
                Log.e("ServiceHandler", "Couldn't get any data from the url");
            }

            return null;
        }

        @Override
        protected void onPostExecute(Void result) {
            super.onPostExecute(result);
            // Dismiss the progress dialog
          //  if (pDialog.isShowing())
            //    pDialog.dismiss();

            if(status.equals("true"))
            {
                Toast.makeText(getApplicationContext(), "thanxxx!!", Toast.LENGTH_LONG).show();
                Intent inent = new Intent(getApplicationContext(), Score.class);
                startActivity(inent);
                cd.cancel();
                quiz.this.finish();
            }
            else
            {
                Toast.makeText(getApplicationContext(),"Check your connectivity to the server "+Settings.sa, Toast.LENGTH_LONG).show();
            }
        }

    }


    private void setAnswer() {
        if (answer1.isChecked())
            selected[quesIndex] = 0;
        if (answer2.isChecked())
            selected[quesIndex] = 1;
        if (answer3.isChecked())
            selected[quesIndex] = 2;
        if (answer4.isChecked())
            selected[quesIndex] = 3;

        Log.d("",Arrays.toString(selected));
        Log.d("",Arrays.toString(correctAns));

    }

    private OnClickListener nextListener = new OnClickListener() {
        public void onClick(View v) {
            setAnswer();
            quesIndex++;
            if (quesIndex >= Details.loadQuestions().length())
                quesIndex = Details.loadQuestions().length() - 1;

            showQuestion(quesIndex);
        }
    };

    private OnClickListener prevListener = new OnClickListener() {
        public void onClick(View v) {
            setAnswer();
            quesIndex--;
            if (quesIndex < 0)
                quesIndex = 0;

            showQuestion(quesIndex);
        }
    };

    private void setScoreTitle() {
        this.setTitle("Question     " + (quesIndex + 1) + " of " + Details.loadQuestions().length());
    }


}